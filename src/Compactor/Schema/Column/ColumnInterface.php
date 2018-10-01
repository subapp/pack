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
     * @param string $name
     */
    public function setName($name);
    
    /**
     * @param string $name
     */
    public function setColumnName($name);
    
    /**
     * @return string
     */
    public function getTypeName();
    
    /**
     * @return Type
     */
    public function getType();
    
    /**
     * @param mixed $value
     */
    public function nullIf($value);

    /**
     * @param Type $type
     * @return mixed
     */
    public function setType(Type $type);
    
    /**
     * @return Type
     */
    public function retrieveType();
    
    /**
     * @return integer
     */
    public function getPosition();
    
    /**
     * @return integer
     */
    public function getLength();

}