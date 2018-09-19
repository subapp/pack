<?php

namespace Subapp\Pack\Schema\Value;

/**
 * Interface DefinitionInterface
 * @package Subapp\Pack\Schema\Definition
 */
interface ValueInterface
{

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getColumnName();

}