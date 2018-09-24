<?php

namespace Subapp\Pack\ProcessHandler;

/**
 * Interface ProcessHandlerInterface
 * @package Subapp\Pack\ProcessHandler
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