<?php

namespace Subapp\Pack\Compactor\Factory;

use Subapp\Pack\Compactor\Accessor\ArrayAccessor;
use Subapp\Pack\Compactor\Accessor\ArrayIteratorAccessor;
use Subapp\Pack\Compactor\Accessor\ObjectAccessor;
use Subapp\Pack\Compactor\Accessor\AccessorInterface;
use Subapp\Pack\Compactor\Accessor\ValuesCollectionAccessor;
use Subapp\Pack\Compactor\Collection\ValuesInterface;

/**
 * Class AccessorFactory
 * @package Subapp\Pack\Compactor\Factory
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