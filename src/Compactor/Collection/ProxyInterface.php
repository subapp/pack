<?php

namespace Subapp\Pack\Compactor\Collection;

/**
 * Interface ProxyInterface
 * @package Subapp\Pack\Compactor\Collection
 */
interface ProxyInterface
{

    /**
     * @return mixed
     */
    public function initialize();

    /**
     * @return boolean
     */
    public function isInitialized();

}