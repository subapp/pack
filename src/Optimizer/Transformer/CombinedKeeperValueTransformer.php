<?php

namespace Subapp\Pack\Optimizer\Transformer;

use Subapp\Pack\Optimizer\Accessor\AccessorInterface;
use Subapp\Pack\Optimizer\Schema\Column\ColumnInterface;
use Subapp\Pack\Optimizer\Schema\Column\ColumnsKeeperInterface;
use Subapp\Pack\Optimizer\Schema\Column\CombinedColumn;

/**
 * Class CombinedKeeperDataProcessor
 * @package Subapp\Pack\Optimizer\ValueCompactor
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
        
        $output->setValue($column->getName(), $this->toPlatformValue($value, $column));
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