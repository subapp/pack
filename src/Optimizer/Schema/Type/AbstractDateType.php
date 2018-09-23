<?php

namespace Subapp\Pack\Optimizer\Schema\Type;

use Subapp\Pack\Optimizer\Utils\DateTime;

/**
 * Class AbstractDateType
 * @package Subapp\Pack\Optimizer\Schema\Type
 */
abstract class AbstractDateType extends Type
{
    
    /**
     * @param $value
     *
     * @return mixed
     */
    public function toPhpValue($value)
    {
        return $this->toDateTimeObject($value);
    }
    
    /**
     * @param $value
     *
     * @return \DateTime|null
     */
    protected function toDateTimeObject($value)
    {
        $datetime = null;
        
        switch (true) {
            case $value instanceof \DateTime:
                $datetime = new DateTime($value->format(\DateTime::RFC3339));
                break;
            case is_numeric($value):
                $datetime = new DateTime(sprintf('@%d', $value));
                break;
            case is_string($value):
                $datetime = new DateTime($value);
                break;
        }
        
        return $datetime;
    }

    /**
     * @return string
     */
    protected function getFormat()
    {
        $extraData = $this->getExtra();
        
        return is_array($extraData) && isset($extraData['format']) ? $extraData['format'] : 'Y-m-d H:i:s';
    }

}