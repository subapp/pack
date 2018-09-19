<?php

namespace Subapp\Pack\Serializer;

/**
 * Class PhpSerializer
 * @package Subapp\Pack\Serializer
 */
class PhpSerializer implements SerializerInterface
{

    /**
     * @inheritDoc
     */
    public function serialize($data)
    {
        return serialize($data);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        return unserialize($serialized);
    }

}