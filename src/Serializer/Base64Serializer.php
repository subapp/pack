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
        $data = is_resource($data) ? $data : $this->serializer->serialize($data);
        
        return base64_encode($data);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        $data = base64_decode($serialized);
        
        return is_resource($data) ? $data : $this->serializer->unserialize($data);
    }

}