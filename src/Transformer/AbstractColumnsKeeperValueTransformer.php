<?php

namespace Subapp\Pack\Transformer;

use Subapp\Pack\Accessor\AccessorInterface;
use Subapp\Pack\Accessor\ArrayAccessor;
use Subapp\Pack\Schema\Column\ColumnInterface;
use Subapp\Pack\Schema\Column\ColumnsKeeperInterface;

/**
 * Class AbstractColumnsKeeperValueTransformer
 * @package Subapp\Pack\Transformer
 */
abstract class AbstractColumnsKeeperValueTransformer extends AbstractValueTransformer
{
    
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
    
    /**
     * @inheritDoc
     */
    public function expand(ColumnInterface $column, AccessorInterface $input, AccessorInterface $output)
    {
        if ($column instanceof ColumnsKeeperInterface) {
            $accessor = $this->getArrayAccessor($column, $input);
            
            foreach ($column->getColumns() as $inner) {
                $value = $this->getUnconvertedValue($inner, $accessor);
                $output->setValue($inner->getColumnName(), $value);
            }
            
            unset($accessor);
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
            $collection = array_combine($this->getInnerKeys($column), $this->getInnerValues($column, $input));
        }
        
        return new ArrayAccessor($collection);
    }
    
    /**
     * @param ColumnInterface   $column
     * @param AccessorInterface $input
     * @return array
     */
    abstract protected function getInnerValues(ColumnInterface $column, AccessorInterface $input);
    
}