<?php

namespace Subapp\Pack\Optimizer\Packer;

use Subapp\Pack\Optimizer\Collection\ValuesInterface;
use Subapp\Pack\Optimizer\Packer\Builder\PackFormatBuilder;
use Subapp\Pack\Optimizer\Packer\PhpPack\PhpPackInterface;

/**
 * Class Packer
 * @package Subapp\Pack\Optimizer\Packer
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

        $values->batch($this->pack->unpack($pattern, $value));
    }
    
}