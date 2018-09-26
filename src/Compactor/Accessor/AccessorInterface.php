<?php

namespace Subapp\Pack\Compactor\Accessor;

/**
 * Interface AccessorInterface
 * @package Subapp\Pack\Compactor\Accessor
 */
interface AccessorInterface extends \Countable
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
     * @param string $keyName
     * @return boolean
     */
    public function hasValue($keyName);
    
    /**
     * @return integer
     */
    public function countValues();
    
    /**
     * @var $source array|object
     */
    public function setSource($source);
    
    /**
     * @return array|object
     */
    public function getSource();

}