<?php

namespace Subapp\Pack\Factory;

use Subapp\Pack\Transformer\BitMaskKeeperValueTransformer;
use Subapp\Pack\Transformer\CombinedKeeperValueTransformer;
use Subapp\Pack\Transformer\UsualValueTransformer;
use Subapp\Pack\Transformer\ValueTransformerInterface;
use Subapp\Pack\Schema\Column\BitMaskColumn;
use Subapp\Pack\Schema\Column\ColumnInterface;
use Subapp\Pack\Schema\Column\CombinedColumn;

/**
 * Class ValueTransformerFactory
 * @package Subapp\Pack\Transformer
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
    public function getValueTransformer(ColumnInterface $column)
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
            $this->shared[$name] = $this->getValueTransformer($column);
        }
        
        return $this->shared[$name];
    }
    
}