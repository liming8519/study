<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: schedule.proto

namespace ScheduleMicroservice;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>ScheduleMicroservice.DeleteParameter</code>
 */
class DeleteParameter extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string identity = 1;</code>
     */
    protected $identity = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $identity
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Schedule::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string identity = 1;</code>
     * @return string
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * Generated from protobuf field <code>string identity = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setIdentity($var)
    {
        GPBUtil::checkString($var, True);
        $this->identity = $var;

        return $this;
    }

}

