<?php

namespace Subapp\Pack\Compactor\Schema;

use Subapp\Pack\Compactor\Collection\Columns;
use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;

/**
 * Interface SchemaInterface
 * @package Subapp\Pack\Compactor\Schema
 */
interface SchemaInterface
{

    /**
     * @param ColumnInterface $value
     * @return void
     */
    public function addColumn(ColumnInterface $value);

    /**
     * @return ColumnInterface[]|Columns
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
    
    /**
     * @return int
     */
    public function getByteSize();

}