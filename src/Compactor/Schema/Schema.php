<?php

namespace Subapp\Pack\Compactor\Schema;

use Subapp\Collection\Collection;
use Subapp\Collection\CollectionInterface;
use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;

/**
 * Class Schema
 * @package Subapp\Pack\Compactor\Schema
 */
class Schema implements SchemaInterface
{

    /**
     * @var Version
     */
    private $version;

    /**
     * @var CollectionInterface
     */
    private $collection = [];

    /**
     * Schema constructor.
     * @param Version $version
     */
    public function __construct(Version $version)
    {
        $this->collection = new Collection([], ColumnInterface::class);
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
        return $this->collection->sort(function (ColumnInterface $columnA, ColumnInterface $columnB) {
            return $columnA->getPosition() - $columnB->getPosition();
        });
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