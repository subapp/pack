<?php

namespace Subapp\Pack\Optimizer\Utils;

/**
 * Class DatetimeStringable
 * @package Subapp\Pack\Optimizer\Utils
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