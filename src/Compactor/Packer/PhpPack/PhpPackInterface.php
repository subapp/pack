<?php

namespace Subapp\Pack\Compactor\Packer\PhpPack;

/**
 * Interface PhpPackerInterface
 * @package Subapp\Pack\Compactor\Packer\PhpPack
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