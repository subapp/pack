<?php

namespace Subapp\Pack\Optimizer\Transformer;

use Subapp\Pack\Optimizer\Accessor\AccessorInterface;
use Subapp\Pack\Optimizer\Accessor\ArrayAccessor;
use Subapp\Pack\Optimizer\Schema\Column\BitMaskColumn;
use Subapp\Pack\Optimizer\Schema\Column\ColumnInterface;
use Subapp\Pack\Optimizer\Schema\Column\ColumnsKeeperInterface;

/**
 * Class BitMaskKeeperDataProcessor
 * @package Subapp\Pack\Optimizer\ValueCompactor
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
        $values = [];
        /** @var ColumnsKeeperInterface|ColumnInterface $column */
        $mask = $input->getValue($column->getName());
    
        for ($index = 0, $length = count($column->getColumns()); $index < $length; $index++) {
            $values[$index] = (boolean)($mask & (1 << $index));
        }
        
        return $values;
    }
    
}