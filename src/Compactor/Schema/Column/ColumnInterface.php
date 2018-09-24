<?php

namespace Subapp\Pack\Compactor\Schema\Column;

use Subapp\Pack\Compactor\Schema\Type\Type;

/**
 * Interface ColumnInterface
 * @package Subapp\Pack\Compactor\Schema\Definition
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
    public function getTypeName();
    
    /**
     * @return Type
     */
    public function getType();
    
    /**
     * @return integer
     */
    public function getPosition();
    
    /**
     * @return integer
     */
    public function getLength();

}