<?php

namespace Subapp\Pack\Schema\Column;

/**
 * Class AbstractValueLength
 * @package Subapp\Pack\Schema\Column
 */
abstract class AbstractColumnLength extends AbstractColumn implements ColumnLengthInterface
{

    /**
     * @var integer
     */
    protected $length;

    /**
     * AbstractValueLength constructor.
     * @param string $name
     * @param string $column
     * @param integer $length
     */
    public function __construct($name, $column, $length)
    {
        parent::__construct($name, $column);

        $this->length = $length;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

}