<?php

namespace Subapp\Pack\Schema;

use Subapp\Pack\Schema\Column\ColumnInterface;

/**
 * Interface SchemaInterface
 * @package Subapp\Pack\Schema
 */
interface SchemaInterface
{

    /**
     * @param ColumnInterface $value
     * @return void
     */
    public function addValue(ColumnInterface $value);

    /**
     * @return ColumnInterface[]
     */
    public function getValues();

    /**
     * @param string $name
     * @return ColumnInterface
     */
    public function getValue($name);

    /**
     * @param string $name
     * @return boolean
     */
    public function hasValue($name);

    /**
     * @return Version
     */
    public function getVersion();

}