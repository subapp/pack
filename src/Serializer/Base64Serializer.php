<?php

namespace Subapp\Pack\Serializer;

/**
 * Class Base64Serializer
 * @package Subapp\Pack\Serializer
 */
class Base64Serializer implements SerializerInterface
{

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * Base64Serializer constructor.
     */
    public function __construct()
    {
        $this->serializer = new PhpSerializer();
    }

    /**
     * @inheritDoc
     */
    public function serialize($data)
    {
        return base64_encode($this->serializer->serialize($data));
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        return $this->serializer->unserialize(base64_decode($serialized));
    }

}