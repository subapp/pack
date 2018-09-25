<?php

namespace Subapp\Pack\Compactor\Schema\Type;

/**
 * Class EnumType
 * @package Subapp\Pack\Compactor\Schema\Type
 */
class EnumType extends StringType
{
    
    /**
     * @inheritDoc
     */
    public function toPhpValue($value)
    {
        $this->validateEnumValue($value);
        
        return parent::toPhpValue($value);
    }
    
    /**
     * @param $value
     *
     * @return string
     */
    public function toPlatformValue($value)
    {
        $this->validateEnumValue($value);
        
        return parent::toPlatformValue($value);
    }
    
    /**
     * @param $value
     * @throws \InvalidArgumentException
     */
    private function validateEnumValue($value)
    {
        if (!is_array($this->getExtra()) || !in_array($value, $this->getExtra(), true)) {
            throw new \InvalidArgumentException(sprintf('Enumeration type error. Allowed only (%s)', implode(', ', $this->getExtra())));
        }
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::ENUM;
    }
    
}
