<?php

namespace Subapp\Pack\Compactor\Schema\Column;

/**
 * Class AbstractDoubleNumberColumn
 * @package Subapp\Pack\Compactor\Schema\Column
 */
abstract class AbstractDoubleNumberColumn extends AbstractColumn
{
    
    /**
     * @var integer
     */
    private $precision;
    
    /**
     * @inheritDoc
     */
    public function __construct($name, $column, $precision, $position)
    {
        parent::__construct($name, $column, $position);
        
        $this->precision = $precision;
    }
    
    /**
     * @inheritDoc
     */
    public function retrieveType()
    {
        $columnType = parent::retrieveType();
        
        $columnType->setPrecision($this->getPrecision());
        
        return $columnType;
    }
    
    /**
     * @return integer
     */
    public function getPrecision()
    {
        return $this->precision;
    }

}