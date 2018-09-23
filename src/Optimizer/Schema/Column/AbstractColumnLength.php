<?php

namespace Subapp\Pack\Optimizer\Schema\Column;

/**
 * Class AbstractValueLength
 * @package Subapp\Pack\Optimizer\Schema\Column
 */
abstract class AbstractColumnLength extends AbstractColumn
{
    
    /**
     * AbstractValueLength constructor.
     * @param string $name
     * @param string $column
     * @param integer $length
     * @param integer $position
     */
    public function __construct($name, $column, $length, $position)
    {
        parent::__construct($name, $column, $position);

        $this->length = $length;
    }

}