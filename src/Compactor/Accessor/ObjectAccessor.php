<?php

namespace Subapp\Pack\Compactor\Accessor;

/**
 * Class ObjectDataAccessor
 * @package Subapp\Pack\Compactor\Accessor
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
     * @inheritDoc
     */
    public function hasValue($keyName)
    {
        return $this->reflection->hasProperty($keyName);
    }
    
    /**
     * @inheritDoc
     */
    public function countValues()
    {
        return count($this->reflection->getProperties());
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