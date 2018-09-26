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
            $accessor = $this->getArrayAccessor($column, $input);
            
            foreach ($column->getColumns() as $inner) {
                $this->expand($inner, $accessor, $output);
            }
            
            unset($accessor);
        } else {
            parent::expand($column, $input, $output);
        }
    }
    
    /**
     * @param ColumnInterface    $column
     * @param AccessorInterface $input
     * @return ArrayAccessor
     */
    protected function getArrayAccessor(ColumnInterface $column, AccessorInterface $input)
    {
        $collection = [];
        
        if ($column instanceof ColumnsKeeperInterface) {
            $collection = array_combine(...$this->getValuesKeysPairs($column, $input));
        }
        
        return new ArrayAccessor($collection);
    }
    
    /**
     * @param ColumnsKeeperInterface $column
     * @param AccessorInterface      $input
     * @return array
     * @throws \UnexpectedValueException
     */
    protected function getValuesKeysPairs(ColumnsKeeperInterface $column, AccessorInterface $input)
    {
        $values = $this->getInnerValues($column, $input);
        $keys = $this->getInnerKeys($column);
        
        if (($countValues = count($values)) !== ($countKeys = count($keys))) {
            throw new \UnexpectedValueException(sprintf('Unexpected count of pairs for keys (%d) and values (%s). Expected: (%s)',
                $countKeys, $countValues, implode(', ', $keys)));
        }
        
        return [$keys, $values];
    }
    
    /**
     * @param ColumnsKeeperInterface   $column
     * @param AccessorInterface $input
     * @return array
     */
    protected function getInnerValues(ColumnsKeeperInterface $column, AccessorInterface $input)
    {
        return $this->expandValue($column, $input);
    }

    /**
     * @param ColumnsKeeperInterface $column
     * @return array
     */
    protected function getInnerKeys(ColumnsKeeperInterface $column)
    {
        $keys = [];

        foreach ($column->getColumns() as $inner) {
            $keys[] = $inner->getName();
        }

        return $keys;
    }
    
}