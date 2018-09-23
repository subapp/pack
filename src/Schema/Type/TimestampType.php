<?php

namespace Subapp\Pack\Schema\Type;

/**
 * Class TimestampType
 * @package Subapp\Pack\Schema\Type
 */
class TimestampType extends AbstractDateType
{
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::TIMESTAMP;
    }
    
    /**
     * @inheritDoc
     */
    public function toPlatformValue($value)
    {
        return $this->toDateTimeObject($value)->getTimestamp();
    }
    
}