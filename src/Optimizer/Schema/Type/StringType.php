<?php

namespace Subapp\Pack\Optimizer\Schema\Type;

/**
 * Class StringType
 *
 * @package Subapp\Pack\Optimizer\Schema\Type
 */
class StringType extends AbstractScalarType
{
    
    /**
     * @inheritDoc
     */
    public function toPhpValue($value)
    {
        $this->validateStringLength($value);
        
        return (string) parent::toPhpValue($value);
    }
    
    /**
     * @inheritDoc
     */
    public function toPlatformValue($value)
    {
        $this->validateStringLength($value);
        
        return (string) parent::toPlatformValue($value);
    }
    
    /**
     * @param $value
     * @throws \InvalidArgumentException
     */
    private function validateStringLength($value)
    {
        if ($this->getLength() && ($length = mb_strlen($value)) > $this->getLength()) {
            throw new \InvalidArgumentException(sprintf('String value is greater than allowed size (Allowed: %s bytes, Given: %d bytes)', $this->getLength(), $length));
        }
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::STRING;
    }
    
}