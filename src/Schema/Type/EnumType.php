<?php

namespace Subapp\Pack\Schema\Type;

/**
 * Class EnumType
 * @package Subapp\Pack\Schema\Type
 */
class EnumType extends StringType
{
    
    /**
     * @inheritDoc
     */
    public function toPhpValue($value)
    {
        return parent::toPhpValue($value);
    }
    
    /**
     * @param $value
     *
     * @return string
     * @throws \InvalidArgumentException
     */
    public function toPlatformValue($value)
    {
        if (!is_array($this->getExtra()) || !in_array($value, $this->getExtra())) {
            throw new \InvalidArgumentException(sprintf('Enumeration type error. Allowed only (%s)', implode(', ', $this->getExtra())));
        }
        
        return parent::toPlatformValue($value);
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::ENUM;
    }
    
}
