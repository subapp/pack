<?php

namespace Subapp\Pack\Schema\Type;

/**
 * Class AbstractScalarType
 * @package Subapp\Pack\Schema\Type
 */
abstract class AbstractScalarType extends Type
{
    
    /**
     * @param $value
     *
     * @return mixed
     */
    public function toPhpValue($value)
    {
        static::validateScalarValue($value);
        
        return $value;
    }
    
    /**
     * @param $value
     *
     * @throws \InvalidArgumentException
     */
    private static function validateScalarValue($value)
    {
        if (!is_scalar($value)) {
            throw new \InvalidArgumentException(sprintf('Type handler %s expect only scalar value types', static::class));
        }
    }
    
    /**
     * @param $value
     *
     * @return mixed
     */
    public function toPlatformValue($value)
    {
        static::validateScalarValue($value);
        
        return $value;
    }
    
}