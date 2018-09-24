<?php

namespace Subapp\Pack\Compactor\Transformer;

use Subapp\Pack\Compactor\Accessor\AccessorInterface;
use Subapp\Pack\Compactor\Accessor\ArrayAccessor;
use Subapp\Pack\Compactor\Schema\Column\BitMaskColumn;
use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;
use Subapp\Pack\Compactor\Schema\Column\ColumnsKeeperInterface;

/**
 * Class BitMaskKeeperDataProcessor
 * @package Subapp\Pack\Compactor\Transformer
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