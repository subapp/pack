<?php

namespace Subapp\Pack\Optimizer\Schema\Type;

/**
 * Class IntegerType
 * @package Subapp\Pack\Optimizer\Schema\Type
 */
class IntegerType extends AbstractScalarType
{
    
    /**
     * @inheritDoc
     */
    public function toPhpValue($value)
    {
        return (integer) parent::toPhpValue($value);
    }
    
    /**
     * @inheritDoc
     */
    public function toPlatformValue($value)
    {
        return (integer) parent::toPlatformValue($value);
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::INTEGER;
    }
    
}