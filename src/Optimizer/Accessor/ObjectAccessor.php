<?php

namespace Subapp\Pack\Optimizer\Accessor;

/**
 * Class ObjectDataAccessor
 * @package Subapp\Pack\Optimizer\Accessor
 *
 * @property \stdClass $source
 */
class ObjectAccessor extends AbstractAccessor
{
    
    /**
     * @var \ReflectionClass
     */
    private $reflection;

    /**
     * ObjectDataAccessor constructor.
     * @param $source
     */
    public function __construct($source)
    {
        parent::__construct($source);
        
        $this->reflection = new \ReflectionObject($source);
    }

    /**
     * @inheritDoc
     */
    public function getValue($keyName)
    {
        return $this->getAccessibleProperty($keyName)->getValue($this->source);
    }

    /**
     * @inheritDoc
     */
    public function setValue($keyName, $value)
    {
        $this->getAccessibleProperty($keyName)->setValue($this->source, $value);
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