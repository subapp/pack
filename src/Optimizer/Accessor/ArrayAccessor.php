<?php

namespace Subapp\Pack\Optimizer\Accessor;

/**
 * Class ArrayAccessor
 * @package Subapp\Pack\Optimizer\Accessor
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

}