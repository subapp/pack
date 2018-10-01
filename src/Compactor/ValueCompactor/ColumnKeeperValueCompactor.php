<?php

namespace Subapp\Pack\Compactor\ValueCompactor;

use Subapp\Pack\Compactor\Accessor\AccessorInterface;
use Subapp\Pack\Compactor\Accessor\ArrayAccessor;
use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;
use Subapp\Pack\Compactor\Schema\Column\ColumnsKeeperInterface;

/**
 * Class ColumnKeeperValueCompactor
 * @package Subapp\Pack\Compactor\ValueCompactor
 */
class ColumnKeeperValueCompactor extends UsualValueCompactor
{

    /**
     * @inheritDoc
     */
    public function collapse(ColumnInterface $column, AccessorInterface $input, AccessorInterface $output)
    {
        if ($column instanceof ColumnsKeeperInterface) {
            $values = [];

            foreach ($column->getColumns() as $inner) {
                $values[] = $this->collapseValue($inner, $input);
            }

            $output->setValue($column->getName(), $this->toPlatformValue($values, $column));
        } else {
            parent::collapse($column, $input, $output);
        }
    }

    /**
     * @inheritDoc
     */
    public function expand(ColumnInterface $column, AccessorInterface $input, AccessorInterface $output)
    {
        if ($column instanceof ColumnsKeeperInterface) {
            $accessor = $this->createArrayAccessor($column, $input);
            
            foreach ($column->getColumns() as $inner) {
                $this->expand($inner, $accessor, $output);
            }
            
            unset($accessor);
        } else {
            parent::expand($column, $input, $output);
        }
    }
    
    /**
     * @param ColumnInterface $column
     * @param AccessorInterface      $input
     * @return ArrayAccessor
     */
    protected function createArrayAccessor(ColumnInterface $column, AccessorInterface $input)
    {
        /** @var ColumnInterface $column */
        return $this->composeArrayAccessor($this->getInnerKeys($column), $this->getInnerValues($column, $input));
    }
    
    /**
     * @param ColumnInterface   $column
     * @param AccessorInterface $input
     * @return array
     */
    protected function getInnerValues(ColumnInterface $column, AccessorInterface $input)
    {
        return $this->expandValue($column, $input);
    }
    
    /**
     * @param ColumnInterface $column
     * @return array
     */
    protected function getInnerKeys(ColumnInterface $column)
    {
        $keys = [];

        if ($column instanceof ColumnsKeeperInterface) {
            foreach ($column->getColumns() as $inner) {
                $keys[] = $inner->getName();
            }
        }
        
        return $keys;
    }
    
}