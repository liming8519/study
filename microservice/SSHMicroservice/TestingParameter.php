<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: ssh.proto

namespace SSHMicroservice;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>SSHMicroservice.TestingParameter</code>
 */
class TestingParameter extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string host = 1;</code>
     */
    protected $host = '';
    /**
     * Generated from protobuf field <code>uint32 port = 2;</code>
     */
    protected $port = 0;
    /**
     * Generated from protobuf field <code>string username = 3;</code>
     */
    protected $username = '';
    /**
     * Generated from protobuf field <code>string password = 4;</code>
     */
    protected $password = '';
    /**
     * Generated from protobuf field <code>string private_key = 5;</code>
     */
    protected $private_key = '';
    /**
     * Generated from protobuf field <code>string passphrase = 6;</code>
     */
    protected $passphrase = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $host
     *     @type int $port
     *     @type string $username
     *     @type string $password
     *     @type string $private_key
     *     @type string $passphrase
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Ssh::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string host = 1;</code>
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Generated from protobuf field <code>string host = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setHost($var)
    {
        GPBUtil::checkString($var, True);
        $this->host = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint32 port = 2;</code>
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Generated from protobuf field <code>uint32 port = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setPort($var)
    {
        GPBUtil::checkUint32($var);
        $this->port = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string username = 3;</code>
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Generated from protobuf field <code>string username = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setUsername($var)
    {
        GPBUtil::checkString($var, True);
        $this->username = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string password = 4;</code>
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Generated from protobuf field <code>string password = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setPassword($var)
    {
        GPBUtil::checkString($var, True);
        $this->password = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string private_key = 5;</code>
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->private_key;
    }

    /**
     * Generated from protobuf field <code>string private_key = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setPrivateKey($var)
    {
        GPBUtil::checkString($var, True);
        $this->private_key = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string passphrase = 6;</code>
     * @return string
     */
    public function getPassphrase()
    {
        return $this->passphrase;
    }

    /**
     * Generated from protobuf field <code>string passphrase = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setPassphrase($var)
    {
        GPBUtil::checkString($var, True);
        $this->passphrase = $var;

        return $this;
    }

}

