<?php

namespace Subapp\Pack\Compactor\Schema\Type;

/**
 * Class JsonType
 *
 * @package Subapp\Pack\Compactor\Schema\Type
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
