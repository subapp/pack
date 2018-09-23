<?php

namespace Subapp\Pack\Optimizer\Schema\Column;

/**
 * Class AbstractDoubleNumberColumn
 * @package Subapp\Pack\Optimizer\Schema\Column
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
    public function __construct($name, $column, $position, $precision = 4)
    {
        parent::__construct($name, $column, $position);
        
        $this->precision = $precision;
    }
    
    /**
     * @inheritDoc
     */
    public function getType()
    {
        $columnType = parent::getType();
        
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