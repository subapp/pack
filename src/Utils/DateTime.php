<?php

namespace Subapp\Pack\Utils;

/**
 * Class DatetimeStringable
 * @package Subapp\Pack\Utils
 */
class DateTime extends \DateTime
{
    
    /**
     * @var string
     */
    private $format = DATE_ATOM;
    
    /**
     * @return string
     */
    public function getInnerFormat()
    {
        return $this->format;
    }
    
    /**
     * @param string $format
     */
    public function setInnerFormat($format)
    {
        $this->format = $format;
    }
    
    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->format($this->getInnerFormat());
    }
    
}