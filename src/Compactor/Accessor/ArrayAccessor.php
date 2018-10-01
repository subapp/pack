<?php

namespace Subapp\Pack\Compactor\Accessor;

/**
 * Class ArrayAccessor
 * @package Subapp\Pack\Compactor\Accessor
 *
 * @property array $source
 */
class ArrayAccessor extends AbstractAccessor
{
    
    /**
     * @inheritDoc
     */
    public function getValue($keyName)
    {
        return $this->source[$keyName] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function setValue($keyName, $value)
    {
        $this->source[$keyName] = $value;
    }
    
    /**
     * @inheritDoc
     */
    public function hasValue($keyName)
    {
        return isset($this->source[$keyName]);
    }
    
    /**
     * @inheritDoc
     */
    public function countValues()
    {
        return count($this->source);
    }

    /**
     * @inheritDoc
     */
    public function getKeys()
    {
        return array_keys($this->source);
    }
    
}