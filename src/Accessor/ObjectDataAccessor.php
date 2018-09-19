<?php

namespace Subapp\Pack\Accessor;

/**
 * Class ObjectDataAccessor
 * @package Subapp\Pack\Accessor
 */
class ObjectDataAccessor implements DataAccessorInterface
{

    /**
     * @var object
     */
    private $object;

    /**
     * @var \ReflectionClass
     */
    private $reflection;

    /**
     * ObjectDataAccessor constructor.
     * @param $object
     */
    public function __construct($object)
    {
        $this->object = $object;
        $this->reflection = new \ReflectionObject($object);
    }

    /**
     * @inheritDoc
     */
    public function getValue($keyName)
    {
        return $this->getValuePropertyValue($this->reflection->getProperty($keyName));
    }

    /**
     * @param \ReflectionProperty $property
     * @return string|integer|boolean
     */
    private function getValuePropertyValue(\ReflectionProperty $property)
    {
        return $property->getValue($this->object);
    }

}