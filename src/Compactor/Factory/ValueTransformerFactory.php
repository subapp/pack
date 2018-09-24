<?php

namespace Subapp\Pack\Compactor\Factory;

use Subapp\Pack\Compactor\Transformer\BitMaskKeeperValueTransformer;
use Subapp\Pack\Compactor\Transformer\CombinedKeeperValueTransformer;
use Subapp\Pack\Compactor\Transformer\UsualValueTransformer;
use Subapp\Pack\Compactor\Transformer\ValueTransformerInterface;
use Subapp\Pack\Compactor\Schema\Column\BitMaskColumn;
use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;
use Subapp\Pack\Compactor\Schema\Column\CombinedColumn;

/**
 * Class ValueTransformerFactory
 * @package Subapp\Pack\Compactor\Transformer
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