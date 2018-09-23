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
 * Class ResourceType
 *
 * @package Subapp\Pack\Optimizer\Schema\Type
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