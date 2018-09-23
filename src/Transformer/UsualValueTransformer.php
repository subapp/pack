<?php

namespace Subapp\Pack\Transformer;

use Subapp\Pack\Accessor\AccessorInterface;
use Subapp\Pack\Schema\Column\ColumnInterface;

/**
 * Class UsualDataProcessor
 * @package Subapp\Pack\Transformer
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