<?php
/**
 * This file is part of ColibriLabs package
 *
 * (c) 2016-2018 Ivan Hontarenko
 *
 * For view all licence information open LICENCE file
 */

namespace Subapp\Pack\Optimizer\Schema\Type;

/**
 * Class ResourceStringType
 *
 * @package Subapp\Pack\Optimizer\Schema\Type
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