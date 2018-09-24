<?php

namespace Subapp\Pack\Compactor\Packer\PhpPack;

/**
 * Class PhpPack
 * @package Subapp\Pack\Compactor\Packer
 */
class PhpPack implements PhpPackInterface
{
    
    /**
     * @inheritDoc
     */
    public function pack($format, ...$arguments)
    {
        return pack($format, ...$arguments);
    }
    
    /**
     * @inheritDoc
     */
    public function unpack($format, $value, $offset = 0)
    {
        return unpack($format, $value, $offset);
    }
    
}