<?php

namespace Subapp\Pack\Compactor\Schema\Type;

/**
 * Class ObjectType
 *
 * @package Subapp\Pack\Compactor\Schema\Type
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