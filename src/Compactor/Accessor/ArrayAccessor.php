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

}