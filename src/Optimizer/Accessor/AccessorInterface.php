<?php

namespace Subapp\Pack\Optimizer\Accessor;

/**
 * Interface AccessorInterface
 * @package Subapp\Pack\Optimizer\Accessor
 */
interface AccessorInterface
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
    
    /**
     * @var $source array|object
     */
    public function setSource($source);
    
    /**
     * @return array|object
     */
    public function getSource();

}