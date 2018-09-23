<?php

namespace Subapp\Pack\Transformer;

use Subapp\Pack\Accessor\AccessorInterface;
use Subapp\Pack\Accessor\ArrayAccessor;
use Subapp\Pack\Schema\Column\BitMaskColumn;
use Subapp\Pack\Schema\Column\ColumnInterface;
use Subapp\Pack\Schema\Column\ColumnsKeeperInterface;

/**
 * Class BitMaskKeeperDataProcessor
 * @package Subapp\Pack\Transformer
 */
class BitMaskKeeperValueTransformer extends AbstractColumnsKeeperValueTransformer
{
    
    /**
     * @inheritDoc
     */
    public function collapse(ColumnInterface $column, AccessorInterface $input, AccessorInterface $output)
    {
        $value = 0; $count = 0;
        
        if ($column instanceof BitMaskColumn) {
            foreach ($column->getColumns() as $inner) {
                $value = ($value | ((1 * $this->getConvertedValue($inner, $input)) << $count++));
            }
        }
        
        $output->setValue($column->getName(), $value);
    }
    
    /**
     * @param ColumnInterface   $column
     * @param AccessorInterface $input
     * @return array
     */
    protected function getInnerValues(ColumnInterface $column, AccessorInterface $input)
    {
        $count = 0; $values = [];
        /** @var ColumnsKeeperInterface|ColumnInterface $column */
        $mask = $input->getValue($column->getName());
    
        foreach ($column->getColumns() as $inner) {
            $values[$count] = (boolean)($mask & (1 << $count++));
        }
        
        return $values;
    }
    
}