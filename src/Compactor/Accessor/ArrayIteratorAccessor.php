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
    
}