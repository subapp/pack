<?php

namespace Subapp\Pack\Compactor\Packer;

use Subapp\Pack\Compactor\Collection\ValuesInterface;
use Subapp\Pack\Compactor\Packer\Builder\PackFormatBuilder;
use Subapp\Pack\Compactor\Packer\PhpPack\PhpPackInterface;

/**
 * Class Packer
 * @package Subapp\Pack\Compactor\Packer
 */
class Packer implements PackerInterface
{
    
    /**
     * @var PhpPackInterface
     */
    protected $pack;
    
    /**
     * @var PackFormatBuilder
     */
    private $builder;
    
    /**
     * Packer constructor.
     * @param PhpPackInterface  $pack
     * @param PackFormatBuilder $builder
     */
    public function __construct(PhpPackInterface $pack, PackFormatBuilder $builder)
    {
        $this->pack = $pack;
        $this->builder = $builder;
    }
    
    /**
     * @inheritDoc
     */
    public function pack(ValuesInterface $values)
    {
        $pattern = $this->builder->getPackFormat();
        
        return $this->pack->pack($pattern, ...array_values($values->toArray()));
    }
    
    /**
     * @inheritDoc
     */
    public function unpack($value, ValuesInterface $values)
    {
        $pattern = $this->builder->getUnpackFormat();
        
        $unpacked = $this->pack->unpack($pattern, $value);
        $unpacked = array_map('trim', $unpacked);
        
        $values->batch($unpacked);
    }
    
}