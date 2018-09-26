<?php

namespace Subapp\Pack\Compactor\Schema\Type;

/**
 * Class NullType
 * @package Subapp\Pack\Compactor\Schema\Type
 */
class NullProxyType extends Type
{
    
    /**
     * @var Type
     */
    private $type;
    
    /**
     * @inheritDoc
     */
    public function __construct(Type $type)
    {
        $this->type = $type;
    }
    
    /**
     * @inheritDoc
     * @throws \BadMethodCallException
     */
    public function __call($name, $arguments)
    {
        $type = $this->getType();

        if (false === method_exists($type, $name)) {
            throw new \BadMethodCallException(sprintf('Unable to call method %s::%s(); for inner type',
                get_class($type), $name));
        }
        
        return call_user_func([$type, $name], ...$arguments);
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->getType()->getName();
    }
    
    /**
     * @return Type
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * @inheritDoc
     */
    public function toPhpValue($value)
    {
        return $this->getNullIf() === $value ? null : $this->getType()->toPhpValue($value);
    }
    
    /**
     * @inheritDoc
     */
    public function toPlatformValue($value)
    {
        return $value === null ? $this->getNullIf() : $this->getType()->toPlatformValue($value);
    }
    
    /**
     * @param $value
     */
    public function setNullIf($value)
    {
        $extra = $this->getExtra();
        $extra['nullIf'] = $value;
        $this->setExtra($extra);
    }
    
    /**
     * @return null
     */
    public function getNullIf()
    {
        $extra = $this->getExtra();
        
        return $extra['nullIf'] ?? null;
    }
    
}