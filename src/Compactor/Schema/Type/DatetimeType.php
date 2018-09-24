<?php

namespace Subapp\Pack\Compactor\Schema\Type;

/**
 * Class DatetimeType
 *
 * @package Subapp\Pack\Compactor\Schema\Type
 */
class DatetimeType extends AbstractDateType
{
    
    /**
     * @param $value
     *
     * @return mixed
     */
    public function toPlatformValue($value)
    {
        $datetime = $this->toDateTimeObject($value);
        $format = $this->getFormat();
        
        if (strpos($format, '%') !== false) {
            return strftime($format, $datetime->getTimestamp());
        }
        
        return $datetime->format($format);
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::DATETIME;
    }
    
}