<?php

namespace Subapp\Pack\Optimizer\Schema\Type;

/**
 * Class BooleanType
 * @package Subapp\Pack\Optimizer\Schema\Type
 */
class BooleanType extends IntegerType
{
    
    /**
     * @inheritDoc
     */
    public function toPhpValue($value)
    {
        return (boolean) parent::toPhpValue($value);
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::BOOLEAN;
    }
    
}