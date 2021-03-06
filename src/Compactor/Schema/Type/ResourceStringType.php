<?php

namespace Subapp\Pack\Compactor\Schema\Type;

/**
 * Class ResourceStringType
 *
 * @package Subapp\Pack\Compactor\Schema\Type
 */
class ResourceStringType extends ResourceType
{
    
    /**
     * @inheritDoc
     */
    public function toPhpValue($value)
    {
        return base64_decode(parent::toPhpValue($value));
    }
    
    /**
     * @inheritDoc
     */
    public function toPlatformValue($value)
    {
        return base64_encode(parent::toPlatformValue($value));
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::RESOURCE;
    }
    
}