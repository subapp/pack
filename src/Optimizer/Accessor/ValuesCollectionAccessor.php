<?php

namespace Subapp\Pack\Optimizer\Accessor;

use Subapp\Pack\Optimizer\Collection\ValuesInterface;

/**
 * Class ValuesCollectionAccessor
 * @package Subapp\Pack\Optimizer\Accessor
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
    
}