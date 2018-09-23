<?php

namespace Subapp\Pack\Optimizer\Packer\PhpPack;

/**
 * Interface PhpPackerInterface
 * @package Subapp\Pack\Optimizer\Packer\PhpPack
 */
interface PhpPackInterface
{
    
    /**
     * @param                $format
     * @param integer|string ...$arguments
     * @return string
     */
    public function pack($format, ...$arguments);
    
    /**
     * @param string  $format
     * @param string  $value
     * @param integer $offset
     * @return array
     */
    public function unpack($format, $value, $offset = 0);
    
}