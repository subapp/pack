<?php

namespace Subapp\Pack\Serializer;

/**
 * Class JsonSerializer
 * @package Subapp\Pack\Serializer
 */
class JsonSerializer implements SerializerInterface
{

    /**
     * @inheritDoc
     */
    public function serialize($data)
    {
        return json_encode($data);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        return json_decode($serialized);
    }

}