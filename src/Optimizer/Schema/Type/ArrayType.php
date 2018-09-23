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
 * Class ArrayType
 *
 * @package Subapp\Pack\Optimizer\Schema\Type
 */
class ArrayType extends JsonType
{
    
    /**
     * @param $value
     *
     * @return mixed
     */
    public function toPhpValue($value)
    {
        return parent::toPhpValue($value);
    }
    
    /**
     * @param $value
     *
     * @return mixed
     */
    public function toPlatformValue($value)
    {
        return parent::toPlatformValue($value);
    }
    
}