<?php

namespace Subapp\Pack\Compactor\Packer;

use Subapp\Pack\Compactor\Collection\ValuesInterface;

/**
 * Interface PackerInterface
 * @package Subapp\Pack\Compactor\Packer
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