<?php

namespace Subapp\Pack\Optimizer\Schema;

use Subapp\Pack\Optimizer\Schema\Column\ColumnInterface;

/**
 * Class Schema
 * @package Subapp\Pack\Optimizer\Schema
 */
class Schema implements SchemaInterface
{

    /**
     * @var Version
     */
    private $version;

    /**
     * @var \ArrayIterator
     */
    private $collection = [];

    /**
     * Schema constructor.
     * @param Version $version
     */
    public function __construct(Version $version)
    {
        $this->collection = new \ArrayIterator();
        $this->version = $version;
    }

    /**
     * @inheritDoc
     */
    public function addColumn(ColumnInterface $value)
    {
        $this->collection->offsetSet($value->getName(), $value);
    }

    /**
     * @inheritDoc
     */
    public function getColumns()
    {
        $this->collection->uasort(function (ColumnInterface $columnA, ColumnInterface $columnB) {
            return $columnA->getPosition() - $columnB->getPosition();
        });

        return $this->collection;
    }

    /**
     * @inheritDoc
     */
    public function getColumn($name)
    {
        return $this->collection->offsetGet($name);
    }

    /**
     * @inheritDoc
     */
    public function hasColumn($name)
    {
        return $this->collection->offsetExists($name);
    }

    /**
     * @inheritDoc
     */
    public function getVersion()
    {
        return $this->version;
    }

}