<?php

namespace Subapp\Pack\Accessor;

/**
 * Class ArrayIteratorAccessor
 * @package Subapp\Pack\Accessor
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