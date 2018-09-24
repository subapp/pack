<?php

namespace Subapp\Pack\Compactor\Schema\Type;

/**
 * Class ResourceType
 *
 * @package Subapp\Pack\Compactor\Schema\Type
 */
class ResourceType extends Type
{
    
    /**
     * @inheritDoc
     */
    public function toPhpValue($value)
    {
        return $value;
    }
    
    /**
     * @inheritDoc
     */
    public function toPlatformValue($value)
    {
        return $value;
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::BINARY;
    }
    
}