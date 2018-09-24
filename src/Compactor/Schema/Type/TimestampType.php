<?php

namespace Subapp\Pack\Compactor\Schema\Type;

/**
 * Class TimestampType
 * @package Subapp\Pack\Compactor\Schema\Type
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