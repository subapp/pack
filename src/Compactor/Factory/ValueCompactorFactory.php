<?php

namespace Subapp\Pack\Compactor\Factory;

use Subapp\Pack\Compactor\Hydrator\HydratorInterface;
use Subapp\Pack\Compactor\Schema\Column\SchemaColumn;
use Subapp\Pack\Compactor\ValueCompactor\BitMaskKeeperValueCompactor;
use Subapp\Pack\Compactor\ValueCompactor\ColumnKeeperValueCompactor;
use Subapp\Pack\Compactor\ValueCompactor\SchemaKeeperValueCompactor;
use Subapp\Pack\Compactor\ValueCompactor\UsualValueCompactor;
use Subapp\Pack\Compactor\ValueCompactor\ValueCompactorInterface;
use Subapp\Pack\Compactor\Schema\Column\BitMaskColumn;
use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;
use Subapp\Pack\Compactor\Schema\Column\ValueListColumn;

/**
 * Class ValueCompactorFactory
 * @package Subapp\Pack\Compactor\Factory
 */
class ValueCompactorFactory
{
    
    /**
     * @var array
     */
    private $compactors = [];

    /**
     * @var HydratorInterface
     */
    protected $hydrator;

    /**
     * AbstractValueCompactor constructor.
     * @param HydratorInterface $hydrator
     */
    public function __construct(HydratorInterface $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    /**
     * @param $column
     * @return ValueCompactorInterface
     */
    public function createValueCompactor(ColumnInterface $column)
    {
        switch (true) {
            case ($column instanceof ValueListColumn):
            case ($column instanceof BitMaskColumn):
                return new ColumnKeeperValueCompactor($this->hydrator);
            case ($column instanceof SchemaColumn):
                return new SchemaKeeperValueCompactor($this->hydrator);
            default:
                return new UsualValueCompactor($this->hydrator);
        }
    }
    
    /**
     * @param ColumnInterface $column
     * @return ValueCompactorInterface
     */
    public function getValueCompactor(ColumnInterface $column)
    {
        $name = $column->getName();
        
        if (!isset($this->compactors[$name])) {
            $this->compactors[$name] = $this->createValueCompactor($column);
        }
        
        return $this->compactors[$name];
    }
    
}