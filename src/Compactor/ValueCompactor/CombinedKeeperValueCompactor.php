<?php

namespace Subapp\Pack\Compactor\ValueCompactor;

use Subapp\Pack\Compactor\Accessor\AccessorInterface;
use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;
use Subapp\Pack\Compactor\Schema\Column\ColumnsKeeperInterface;
use Subapp\Pack\Compactor\Schema\Column\CombinedColumn;

/**
 * Class CombinedKeeperDataProcessor
 * @package Subapp\Pack\Compactor\ValueCompactor
 */
class CombinedKeeperValueCompactor extends AbstractColumnsKeeperValueCompactor
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