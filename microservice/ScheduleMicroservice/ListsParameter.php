<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: schedule.proto

namespace ScheduleMicroservice;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>ScheduleMicroservice.ListsParameter</code>
 */
class ListsParameter extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated string identity = 1;</code>
     */
    private $identity;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $identity
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Schedule::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated string identity = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * Generated from protobuf field <code>repeated string identity = 1;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setIdentity($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->identity = $arr;

        return $this;
    }

}

