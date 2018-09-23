<?php

namespace Subapp\Pack\Optimizer\Factory;

use Subapp\Pack\Optimizer\Accessor\ArrayAccessor;
use Subapp\Pack\Optimizer\Accessor\ArrayIteratorAccessor;
use Subapp\Pack\Optimizer\Accessor\ObjectAccessor;
use Subapp\Pack\Optimizer\Accessor\AccessorInterface;

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
            case is_array($data):
                return new ArrayAccessor($data);
            case is_object($data):
                return new ObjectAccessor($data);
            default:
                throw new \UnexpectedValueException('Unsupported value type');
        }
    }
    
}