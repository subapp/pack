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
 * Class FloatType
 *
 * @package Subapp\Pack\Schema\Type
 */
class FloatType extends AbstractScalarType
{
    
    /**
     * @inheritDoc
     */
    public function toPhpValue($value)
    {
        return round(parent::toPhpValue($value), $this->getPrecision());
    }
    
    /**
     * @inheritDoc
     */
    public function toPlatformValue($value)
    {
        return round(parent::toPlatformValue($value), $this->getPrecision());
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::FLOAT;
    }
    
}