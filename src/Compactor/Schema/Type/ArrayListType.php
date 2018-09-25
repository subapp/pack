<?php

namespace Subapp\Pack\Compactor\Schema\Type;

/**
 * Class ArrayListType
 *
 * @package Subapp\Pack\Compactor\Schema\Type
 */
class ArrayListType extends Type
{

    const DEFAULT_SEPARATOR = ';';
    
    /**
     * @inheritDoc
     */
    public function toPhpValue($value)
    {
        return explode($this->getSeparator(), $value);
    }
    
    /**
     * @return string
     */
    public function getSeparator()
    {
        $extra = $this->getExtra();

        return $extra['separator'] ?? self::DEFAULT_SEPARATOR;
    }

    /**
     * @param string $separator
     */
    public function setSeparator($separator)
    {
        $extra = $this->getExtra();
        $extra['separator'] = $separator;
        $this->setExtra($extra);
    }
    
    /**
     * @inheritDoc
     */
    public function toPlatformValue($value)
    {
        return implode($this->getSeparator(), is_array($value) ? $value : [$value]);
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::ARRAY_LIST;
    }
    
}