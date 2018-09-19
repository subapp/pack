<?php

namespace Subapp\Pack\Accessor;

/**
 * Interface ProviderInterface
 * @package Subapp\Pack\Accessor
 */
interface DataAccessorInterface
{

    /**
     * @param string $keyName
     * @return string|integer
     */
    public function getValue($keyName);

}