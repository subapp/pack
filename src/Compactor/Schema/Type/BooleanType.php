<?php

namespace Subapp\Pack\Compactor\Schema\Type;

/**
 * Class BooleanType
 * @package Subapp\Pack\Compactor\Schema\Type
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