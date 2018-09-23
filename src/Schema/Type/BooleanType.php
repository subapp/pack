<?php

namespace Subapp\Pack\Schema\Type;

/**
 * Class BooleanType
 * @package Subapp\Pack\Schema\Type
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