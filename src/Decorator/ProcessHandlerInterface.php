<?php

namespace Subapp\Pack\Decorator;

/**
 * Interface ProcessHandlerInterface
 * @package Subapp\Pack\Decorator
 */
interface ProcessHandlerInterface
{

    /**
     * @param mixed $values
     * @return string
     */
    public function serialize($values);

    /**
     * @param mixed $values
     * @return string|array
     */
    public function unserialize($values);

}