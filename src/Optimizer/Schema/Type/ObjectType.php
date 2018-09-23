<?php

namespace Subapp\Pack\Optimizer\Schema\Type;

/**
 * Class ObjectType
 *
 * @package Subapp\Pack\Optimizer\Schema\Type
 */
class ObjectType extends Type
{
    
    /**
     * @param $value
     *
     * @return mixed
     */
    public function toPhpValue($value)
    {
        return unserialize($value);
    }
    
    /**
     * @param $value
     *
     * @return mixed
     */
    public function toPlatformValue($value)
    {
        return serialize($value);
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::OBJECT;
    }
    
}