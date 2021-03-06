<?php

namespace Subapp\Pack\Decorator;

use Subapp\Pack\Serializer\SerializerInterface;

/**
 * Class SerializerProcessHandler
 * @package Subapp\Pack\Decorator
 */
class SerializerProcessHandler implements ProcessHandlerInterface
{

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * SerializerProcessHandler constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @inheritdoc
     */
    public function serialize($values)
    {
        return $this->serializer->serialize($values);
    }

    /**
     * @inheritdoc
     */
    public function unserialize($values)
    {
        return $this->serializer->unserialize($values);
    }

}