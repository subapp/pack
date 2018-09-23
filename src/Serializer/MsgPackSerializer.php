<?php

namespace Subapp\Pack\Serializer;

/**
 * Class MsgPackSerializer
 * @package Subapp\Pack\Serializer
 */
class MsgPackSerializer implements SerializerInterface
{

    /**
     * @inheritDoc
     */
    public function serialize($data)
    {
        return \msgpack_pack($data);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        return \msgpack_unpack($serialized);
    }

}
