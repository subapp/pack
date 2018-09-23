<?php

namespace Subapp\Pack\Optimizer\Schema\Type;

/**
 * Class TimestampType
 * @package Subapp\Pack\Optimizer\Schema\Type
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