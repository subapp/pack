<?php

namespace Subapp\Pack\Compactor\Schema\Type;

/**
 * Class ArrayType
 *
 * @package Subapp\Pack\Compactor\Schema\Type
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