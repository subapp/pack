<?php

namespace Subapp\Pack\Accessor;

/**
 * Class ArrayAccessor
 * @package Subapp\Pack\Accessor
 */
class ArrayDataAccessor implements DataAccessorInterface
{

    /**
     * @var array
     */
    private $data = [];

    /**
     * ArrayAccessor constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @inheritDoc
     */
    public function getValue($keyName)
    {
        return $this->data[$keyName] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function setValue($keyName, $value)
    {
        $this->data[$keyName] = $value;
    }

}