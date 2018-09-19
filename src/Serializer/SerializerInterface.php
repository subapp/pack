<?php

namespace Subapp\Pack\Serializer;

/**
 * Interface SerializerInterface
 * @package Subapp\Pack\Serializer
 */
interface SerializerInterface
{

    /**
     * @param $data
     * @return string
     */
    public function serialize($data);

    /**
     * @param $serialized
     * @return mixed
     */
    public function unserialize($serialized);

}