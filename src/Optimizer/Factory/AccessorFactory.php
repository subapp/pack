<?php

namespace Subapp\Pack\Optimizer\Factory;

use Subapp\Pack\Optimizer\Accessor\ArrayAccessor;
use Subapp\Pack\Optimizer\Accessor\ArrayIteratorAccessor;
use Subapp\Pack\Optimizer\Accessor\ObjectAccessor;
use Subapp\Pack\Optimizer\Accessor\AccessorInterface;
use Subapp\Pack\Optimizer\Accessor\ValuesCollectionAccessor;
use Subapp\Pack\Optimizer\Collection\ValuesInterface;

/**
 * Class AccessorFactory
 * @package Subapp\Pack\Optimizer\Factory
 */
class AccessorFactory
{
    
    /**
     * @param $data
     * @return AccessorInterface
     * @throws \UnexpectedValueException
     */
    public function getAccessor($data)
    {
        switch (true) {
            case ($data instanceof \ArrayIterator):
                return new ArrayIteratorAccessor($data);
            case ($data instanceof ValuesInterface):
                return new ValuesCollectionAccessor($data);
            case is_array($data):
                return new ArrayAccessor($data);
            case is_object($data):
                return new ObjectAccessor($data);
            default:
                throw new \UnexpectedValueException(sprintf('Unsupported value type (%s)',
                    (is_object($data) ? get_class($data) : gettype($data))));
        }
    }
    
}