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
 * Class StringType
 *
 * @package Subapp\Pack\Schema\Type
 */
class StringType extends AbstractScalarType
{
    
    /**
     * @inheritDoc
     */
    public function toPhpValue($value)
    {
        return (string) parent::toPhpValue($value);
    }
    
    /**
     * @inheritDoc
     */
    public function toPlatformValue($value)
    {
        return (string) parent::toPlatformValue($value);
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::STRING;
    }
    
}