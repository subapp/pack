<?php

namespace Subapp\Pack\Optimizer\Schema;

use Subapp\Pack\Optimizer\Schema\Column\ColumnInterface;

/**
 * Interface SchemaInterface
 * @package Subapp\Pack\Optimizer\Schema
 */
interface SchemaInterface
{

    /**
     * @param ColumnInterface $value
     * @return void
     */
    public function addColumn(ColumnInterface $value);

    /**
     * @return ColumnInterface[]|\ArrayIterator
     */
    public function getColumns();

    /**
     * @param string $name
     * @return ColumnInterface
     */
    public function getColumn($name);

    /**
     * @param string $name
     * @return boolean
     */
    public function hasColumn($name);

    /**
     * @return Version
     */
    public function getVersion();

}