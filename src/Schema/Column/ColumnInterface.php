<?php

namespace Subapp\Pack\Schema\Column;

/**
 * Interface ColumnInterface
 * @package Subapp\Pack\Schema\Definition
 */
interface ColumnInterface
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