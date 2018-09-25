<?php

namespace Subapp\Pack\Compactor\Factory;

use Subapp\Pack\Compactor\ValueCompactor\BitMaskKeeperValueCompactor;
use Subapp\Pack\Compactor\ValueCompactor\CombinedKeeperValueCompactor;
use Subapp\Pack\Compactor\ValueCompactor\UsualValueCompactor;
use Subapp\Pack\Compactor\ValueCompactor\ValueCompactorInterface;
use Subapp\Pack\Compactor\Schema\Column\BitMaskColumn;
use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;
use Subapp\Pack\Compactor\Schema\Column\CombinedColumn;

/**
 * Class ValueCompactorFactory
 * @package Subapp\Pack\Compactor\Factory
 */
class ValueCompactorFactory
{
    
    /**
     * @var array
     */
    private $shared = [];
    
    /**
     * @param $column
     * @return ValueCompactorInterface
     */
    public function getTransformer(ColumnInterface $column)
    {
        switch (true) {
            case ($column instanceof BitMaskColumn):
                return new BitMaskKeeperValueCompactor();
            case ($column instanceof CombinedColumn):
                return new CombinedKeeperValueCompactor();
            default:
                return new UsualValueCompactor();
        }
    }
    
    /**
     * @param ColumnInterface $column
     * @return ValueCompactorInterface
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