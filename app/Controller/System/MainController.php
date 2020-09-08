<?php
declare(strict_types=1);

namespace App\Controller\System;

use App\Client\CosClient;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Support\RedisModel\RefreshToken;
use stdClass;
use Exception;
use App\RedisModel\System\AdminRedis;
use App\RedisModel\System\ResourceRedis;
use App\RedisModel\System\RoleRedis;
use Hyperf\DbConnection\Db;
use Hyperf\Support\Func\Auth;
use Hyperf\Utils\Arr;
use Hyperf\Utils\Context;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

class MainController extends BaseController
{
    use Auth;
    /**
     * @Inject()
     * @var RefreshToken
     */
    private RefreshToken $refreshToken;
    /**
     * @Inject()
     * @var AdminRedis
     */
    private AdminRedis $adminRedis;
    /**
     * @Inject()
     * @var ResourceRedis
     */
    private ResourceRedis $resourceRedis;
    /**
     * @Inject()
     * @var RoleRedis
     */
    private RoleRedis $roleRedis;
    /**
     * @Inject()
     * @var CosClient
     */
    private CosClient $cosClient;

    /**
     * User login
     */
    public function login(): ResponseInterface
    {
        try {
            $body = $this->request->post();
            $validator = $this->validation->make($body, [
                'username' => [
                    'required',
                    'between:4,20'
                ],
                'password' => [
                    'required',
                    'between:12,20'
                ],
            ]);

            if ($validator->fails()) {
                return $this->response->json([
                    'error' => 1,
                    'msg' => $validator->errors()
                ]);
            }

            $data = $this->adminRedis->get($body['username']);

            if (empty($data)) {
                throw new RuntimeException('username not exists');
            }

            if (!$this->hash->check($body['password'], $data['password'])) {
                throw new RuntimeException('password incorrect');
            }
            $symbol = new stdClass();
            $symbol->user = $data['username'];
            $symbol->role = explode(',', $data['role']);
            return $this->create('system', $symbol);
        } catch (Exception $e) {
            return $this->response->json([
                'error' => 1,
                'msg' => $e->getMessage()
            ]);
        }
    }

    /**
     * User verify
     */
    public function verify(): ResponseInterface
    {
        try {
            return $this->authVerify('system');
        } catch (Exception $e) {
            return $this->response->json([
                'error' => 1,
                'msg' => $e->getMessage()
            ]);
        }
    }

    /**
     * User logout
     */
    public function logout(): ResponseInterface
    {
        try {
            return $this->destory('system');
        } catch (Exception $e) {
            return $this->response->json([
                'error' => 1,
                'msg' => $e->getMessage()
            ]);
        }
    }

    /**
     * @return array
     */
    public function resource(): array
    {
        $router = $this->resourceRedis->get();
        $roleKey = Context::get('auth')->role;
        $role = $this->roleRedis->get($roleKey, 'resource');
        $routerRole = array_unique($role);
        $lists = Arr::where(
            $router,
            fn($v) => in_array($v['key'], $routerRole, true)
        );
        return [
            'error' => 0,
            'data' => array_values($lists)
        ];
    }

    /**
     * @return array
     */
    public function information(): array
    {
        $data = Db::table('admin_basic')
            ->where('username', '=', Context::get('auth')->user)
            ->first(['email', 'phone', 'call', 'avatar']);

        return [
            'error' => 0,
            'data' => $data
        ];
    }

    /**
     * @return array
     */
    public function update(): array
    {
        $body = $this->request->post();
        $validator = $this->validation->make($body, [
            'old_password' => [
                'sometimes',
                'between:12,20',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&-+])(?=.*[0-9])[\w|@$!%*?&-+]+$/'
            ],
            'new_password' => [
                'required_with:old_password',
                'between:12,20',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&-+])(?=.*[0-9])[\w|@$!%*?&-+]+$/'
            ],
        ]);

        if ($validator->fails()) {
            return [
                'error' => 1,
                'msg' => $validator->errors()
            ];
        }

        $username = Context::get('auth')->user;
        $data = Db::table('admin_basic')
            ->where('username', '=', $username)
            ->first();

        if (empty($data)) {
            return [
                'error' => 1,
                'msg' => 'not exists'
            ];
        }

        if (!empty($body['old_password'])) {
            if (!$this->hash->check($body['old_password'], $data->password)) {
                throw new RuntimeException('password verification failed');
            }
            $body['password'] = $this->hash->create($body['new_password']);
        }

        unset($body['old_password'], $body['new_password']);
        Db::table('admin_basic')
            ->where('username', '=', $username)
            ->update($body);

        $this->adminRedis->clear();
        return [
            'error' => 0,
            'msg' => 'ok'
        ];
    }

    /**
     * @return array
     * @throws Exception
     */
    public function uploads(): array
    {
        if (!$this->request->hasFile('image')) {
            return [
                'error' => 1,
                'msg' => 'upload file does not exist'
            ];
        }
        $file = $this->request->file('image');
        $fileName = date('Ymd') . '/' .
            uuid()->toString() . '.' .
            $file->getExtension();
        $body = fopen($file->getRealPath(), 'rb');
        $result = $this->cosClient->uploads(
            $fileName,
            $body
        );
        return [
            'error' => 0,
            'data' => [
                'savename' => $result->toArray()['Key']
            ]
        ];
    }
}