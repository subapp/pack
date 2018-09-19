<?php

namespace Subapp\Pack\Serializer;

/**
 * Class MsgPackSerializer
 * @package Subapp\Pack\Serializer
 */
class MsgPackSerializer implements SerializerInterface
{

    /**
     * MsgPackSerializer constructor.
     */
    public function __construct()
    {
        if (!extension_loaded('msgpack')) {
            throw new \RuntimeException('Extension msgPack not installed on your server');
        }
    }

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
