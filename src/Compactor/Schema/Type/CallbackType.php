<?php

namespace Subapp\Pack\Compactor\Schema\Type;

/**
 * Class CallbackType
 * @package Subapp\Pack\Compactor\Schema\Type
 */
class CallbackType extends Type
{

    /**
     * @var callable
     */
    private $callback;

    /**
     * @var Type
     */
    private $inner;

    /**
     * CallbackType constructor.
     * @param callable $callback
     * @param Type $type
     */
    public function __construct(callable $callback, Type $type)
    {
        $this->callback = \Closure::bind($callback, $this);
        $this->inner = $type;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->inner->getName();
    }

    /**
     * @inheritDoc
     */
    public function toPhpValue($value)
    {
        return call_user_func($this->callback, $this->inner->toPhpValue($value));
    }

    /**
     * @inheritDoc
     */
    public function toPlatformValue($value)
    {
        return call_user_func($this->callback, $this->inner->toPlatformValue($value));
    }

}