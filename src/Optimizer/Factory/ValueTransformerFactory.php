<?php

namespace Subapp\Pack\Optimizer\Factory;

use Subapp\Pack\Optimizer\Transformer\BitMaskKeeperValueTransformer;
use Subapp\Pack\Optimizer\Transformer\CombinedKeeperValueTransformer;
use Subapp\Pack\Optimizer\Transformer\UsualValueTransformer;
use Subapp\Pack\Optimizer\Transformer\ValueTransformerInterface;
use Subapp\Pack\Optimizer\Schema\Column\BitMaskColumn;
use Subapp\Pack\Optimizer\Schema\Column\ColumnInterface;
use Subapp\Pack\Optimizer\Schema\Column\CombinedColumn;

/**
 * Class ValueTransformerFactory
 * @package Subapp\Pack\Optimizer\Transformer
 */
class ValueTransformerFactory
{
    
    /**
     * @var array
     */
    private $shared = [];
    
    /**
     * @param $column
     * @return ValueTransformerInterface
     */
    public function getTransformer(ColumnInterface $column)
    {
        switch (true) {
            case ($column instanceof BitMaskColumn):
                return new BitMaskKeeperValueTransformer();
            case ($column instanceof CombinedColumn):
                return new CombinedKeeperValueTransformer();
            default:
                return new UsualValueTransformer();
        }
    }
    
    /**
     * @param ColumnInterface $column
     * @return ValueTransformerInterface
     */
    public function getSharedTransformer(ColumnInterface $column)
    {
        $name = $column->getName();
        
        if (!isset($this->shared[$name])) {
            $this->shared[$name] = $this->getTransformer($column);
        }
        
        return $this->shared[$name];
    }
    
}