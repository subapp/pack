<?php

namespace Subapp\Pack\Optimizer\Transformer;

use Subapp\Pack\Optimizer\Accessor\AccessorInterface;
use Subapp\Pack\Optimizer\Schema\Column\ColumnInterface;

/**
 * Class AbstractValueTransformer
 * @package Subapp\Pack\Optimizer\Transformer
 */
abstract class AbstractValueTransformer implements ValueTransformerInterface
{

    /**
     * @param ColumnInterface   $column
     * @param AccessorInterface $accessor
     * @return mixed
     */
    public function getConvertedValue(ColumnInterface $column, AccessorInterface $accessor)
    {
        $value = $accessor->getValue($column->getColumnName());
        
        return $this->toPlatformValue($value, $column);
    }
    
    /**
     * @param ColumnInterface   $column
     * @param AccessorInterface $accessor
     * @return mixed
     */
    public function getUnconvertedValue(ColumnInterface $column, AccessorInterface $accessor)
    {
        $value = $accessor->getValue($column->getName());
        
        return $this->toPhpValue($value, $column);
    }
    
    /**
     * @param                 $value
     * @param ColumnInterface $column
     * @return mixed
     */
    protected function toPlatformValue($value, ColumnInterface $column)
    {
        return $column->getType()->toPlatformValue($value);
    }
    
    /**
     * @param                 $value
     * @param ColumnInterface $column
     * @return mixed
     */
    protected function toPhpValue($value, ColumnInterface $column)
    {
        return $column->getType()->toPhpValue($value);
    }
    
}