<?php

namespace Subapp\Pack\Compactor\Schema\Type;

/**
 * Class DoubleType
 *
 * @package Subapp\Pack\Compactor\Schema\Type
 */
class DoubleType extends AbstractScalarType
{
    
    /**
     * @inheritDoc
     */
    public function toPhpValue($value)
    {
        return (double) round(parent::toPhpValue($value), $this->getPrecision());
    }
    
    /**
     * @inheritDoc
     */
    public function toPlatformValue($value)
    {
        return (double) round(parent::toPlatformValue($value), $this->getPrecision());
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::DOUBLE;
    }
    
}