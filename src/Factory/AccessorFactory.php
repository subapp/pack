<?php

namespace Subapp\Pack\Factory;

use Subapp\Pack\Accessor\ArrayAccessor;
use Subapp\Pack\Accessor\ArrayIteratorAccessor;
use Subapp\Pack\Accessor\ObjectAccessor;
use Subapp\Pack\Accessor\AccessorInterface;

/**
 * Class AccessorFactory
 * @package Subapp\Pack\Factory
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
            case is_array($data):
                return new ArrayAccessor($data);
            case is_object($data):
                return new ObjectAccessor($data);
            default:
                throw new \UnexpectedValueException('Unsupported value type');
        }
    }
    
}