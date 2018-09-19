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
        return $this->getAccessibleProperty($keyName)->getValue($this->object);
    }

    /**
     * @inheritDoc
     */
    public function setValue($keyName, $value)
    {
        $this->getAccessibleProperty($keyName)->setValue($this->object, $value);
    }

    /**
     * @param $keyName
     * @return \ReflectionProperty
     */
    private function getAccessibleProperty($keyName)
    {
        $protectedBitMask = (\ReflectionProperty::IS_PROTECTED | \ReflectionProperty::IS_PRIVATE);
        $property = $this->reflection->getProperty($keyName);

        if ($property->getModifiers() & $protectedBitMask) {
            $property->setAccessible(true);
        }

        return $property;
    }

}