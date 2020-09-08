<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: schedule.proto

namespace ScheduleMicroservice;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>ScheduleMicroservice.Response</code>
 */
class Response extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>uint32 error = 1;</code>
     */
    protected $error = 0;
    /**
     * Generated from protobuf field <code>string msg = 2;</code>
     */
    protected $msg = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $error
     *     @type string $msg
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Schedule::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>uint32 error = 1;</code>
     * @return int
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Generated from protobuf field <code>uint32 error = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setError($var)
    {
        GPBUtil::checkUint32($var);
        $this->error = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string msg = 2;</code>
     * @return string
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * Generated from protobuf field <code>string msg = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setMsg($var)
    {
        GPBUtil::checkString($var, True);
        $this->msg = $var;

        return $this;
    }

}

