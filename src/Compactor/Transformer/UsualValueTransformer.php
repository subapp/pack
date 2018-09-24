<?php

namespace Subapp\Pack\Compactor\Transformer;

use Subapp\Pack\Compactor\Accessor\AccessorInterface;
use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;

/**
 * Class UsualDataProcessor
 * @package Subapp\Pack\Compactor\Transformer
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