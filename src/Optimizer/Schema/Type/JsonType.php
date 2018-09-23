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
 * Class JsonType
 *
 * @package Subapp\Pack\Optimizer\Schema\Type
 */
class JsonType extends StringType
{
    
    /**
     * @inheritdoc
     */
    public function toPhpValue($value)
    {
        return json_decode($value);
    }
    
    /**
     * @inheritdoc
     */
    public function toPlatformValue($value)
    {
        return parent::toPlatformValue(json_encode($value));
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::JSON;
    }
    
}
