<?php

namespace Subapp\Pack\Optimizer\Schema\Type;

/**
 * Class AbstractScalarType
 * @package Subapp\Pack\Optimizer\Schema\Type
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
        $this->validateScalarValue($value);
        
        return $value;
    }
    
    /**
     * @param $value
     *
     * @throws \InvalidArgumentException
     */
    private function validateScalarValue($value)
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
        $this->validateScalarValue($value);
        
        return $value;
    }
    
}