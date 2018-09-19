<?php

namespace Subapp\Pack\Schema;

use Subapp\Pack\Schema\Value\ValueInterface;

/**
 * Class Schema
 * @package Subapp\Pack\Schema
 */
class Schema implements SchemaInterface
{

    /**
     * @var Version
     */
    private $version;

    /**
     * @var array
     */
    private $collection = [];

    /**
     * Schema constructor.
     * @param Version $version
     */
    public function __construct(Version $version)
    {
        $this->version = $version;
    }

    /**
     * @inheritDoc
     */
    public function addValue(ValueInterface $value)
    {
        $this->collection[$value->getName()] = $value;
    }

    /**
     * @inheritDoc
     */
    public function getValues()
    {
        return $this->collection;
    }

    /**
     * @inheritDoc
     */
    public function getValue($name)
    {
        return $this->collection[$name] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function hasValue($name)
    {
        return isset($this->collection[$name]);
    }

    /**
     * @inheritDoc
     */
    public function getVersion()
    {
        return $this->version;
    }

}