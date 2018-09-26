<?php

namespace Subapp\Pack\Compactor\Accessor;

use Subapp\Pack\Compactor\Collection\ValuesInterface;

/**
 * Class ValuesCollectionAccessor
 * @package Subapp\Pack\Compactor\Accessor
 *
 * @property ValuesInterface $source
 */
class ValuesCollectionAccessor extends AbstractAccessor
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
    
}