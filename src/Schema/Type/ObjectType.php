<?php
/**
 * This file is part of ColibriLabs package
 *
 * (c) 2016-2018 Ivan Hontarenko
 *
 * For view all licence information open LICENCE file
 */

namespace Subapp\Pack\Schema\Type;

/**
 * Class ObjectType
 *
 * @package Subapp\Pack\Schema\Type
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