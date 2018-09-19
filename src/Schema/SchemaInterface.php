<?php

namespace Subapp\Pack\Schema;

use Subapp\Pack\Schema\Value\ValueInterface;

/**
 * Interface SchemaInterface
 * @package Subapp\Pack\Schema
 */
interface SchemaInterface
{

    /**
     * @param ValueInterface $value
     * @return void
     */
    public function addValue(ValueInterface $value);

    /**
     * @return ValueInterface[]
     */
    public function getValues();

    /**
     * @param string $name
     * @return ValueInterface
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