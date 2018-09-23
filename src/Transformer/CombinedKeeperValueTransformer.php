<?php

namespace Subapp\Pack\Transformer;

use Subapp\Pack\Accessor\AccessorInterface;
use Subapp\Pack\Schema\Column\ColumnInterface;
use Subapp\Pack\Schema\Column\ColumnsKeeperInterface;
use Subapp\Pack\Schema\Column\CombinedColumn;

/**
 * Class CombinedKeeperDataProcessor
 * @package Subapp\Pack\Transformer
 */
class CombinedKeeperValueTransformer extends AbstractColumnsKeeperValueTransformer
{
    
    /**
     * @inheritDoc
     */
    public function collapse(ColumnInterface $column, AccessorInterface $input, AccessorInterface $output)
    {
        $value = null;
        
        if ($column instanceof CombinedColumn) {
            $values = [];
            
            foreach ($column->getColumns() as $inner) {
                $values[] = $this->getConvertedValue($inner, $input);
            }
            
            $value = implode($column->getSeparator(), $values);
        }
        
        $output->setValue($column->getName(), $value);
    }
    
    /**
     * @inheritDoc
     */
    protected function getInnerValues(ColumnInterface $column, AccessorInterface $input)
    {
        /** @var ColumnsKeeperInterface|CombinedColumn $column */
        return explode($column->getSeparator(), $input->getValue($column->getName()));
    }
    
}