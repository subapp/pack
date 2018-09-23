<?php

namespace Subapp\Pack\Optimizer\Packer;

use Subapp\Pack\Optimizer\Collection\ValuesInterface;

/**
 * Interface PackerInterface
 * @package Subapp\Pack\Optimizer\Packer
 */
interface PackerInterface
{
    
    /**
     * @param ValuesInterface $values
     * @return string
     */
    public function pack(ValuesInterface $values);
    
    /**
     * @param string          $value
     * @param ValuesInterface $values
     */
    public function unpack($value, ValuesInterface $values);
    
}