<?php

namespace Subapp\Pack\Compactor\Accessor;

/**
 * Class ArrayIteratorAccessor
 * @package Subapp\Pack\Compactor\Accessor
 *
 * @property \ArrayIterator $source
 */
class ArrayIteratorAccessor extends AbstractAccessor
{
    
    /**
     * @inheritDoc
     */
    public function getValue($keyName)
    {
        return $this->source->offsetGet($keyName);
    }
    
    /**
     * @inheritDoc
     */
    public function setValue($keyName, $value)
    {
        $this->source->offsetSet($keyName, $value);
    }
    
    /**
     * @inheritDoc
     */
    public function hasValue($keyName)
    {
        return $this->source->offsetExists($keyName);
    }
    
    /**
     * @inheritDoc
     */
    public function countValues()
    {
        return $this->source->count();
    }

    /**
     * @inheritDoc
     */
    public function getKeys()
    {
        return array_keys($this->source->getArrayCopy());
    }

}