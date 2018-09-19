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

    /**
     * @param string $keyName
     * @param string|integer $value
     */
    public function setValue($keyName, $value);

}