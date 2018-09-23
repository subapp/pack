<?php

namespace Subapp\Pack\Schema\Column;

use Subapp\Pack\Schema\Type\Type;

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
    
    /**
     * @return string
     */
    public function getPhpType();
    
    /**
     * @return Type
     */
    public function getType();
    
    /**
     * @return integer
     */
    public function getPosition();

}