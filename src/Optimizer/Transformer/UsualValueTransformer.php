<?php

namespace Subapp\Pack\Optimizer\Transformer;

use Subapp\Pack\Optimizer\Accessor\AccessorInterface;
use Subapp\Pack\Optimizer\Schema\Column\ColumnInterface;

/**
 * Class UsualDataProcessor
 * @package Subapp\Pack\Optimizer\ValueCompactor
 */
class UsualValueTransformer extends AbstractValueTransformer
{
    
    /**
     * @inheritDoc
     */
    public function collapse(ColumnInterface $column, AccessorInterface $input, AccessorInterface $output)
    {
        $output->setValue($column->getName(), $this->getConvertedValue($column, $input));
    }
    
    /**
     * @inheritDoc
     */
    public function expand(ColumnInterface $column, AccessorInterface $input, AccessorInterface $output)
    {
        $output->setValue($column->getColumnName(), $this->getUnconvertedValue($column, $input));
    }
    
}