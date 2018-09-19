<?php

namespace Subapp\Pack\Schema\Value;

/**
 * Class AbstractValueLength
 * @package Subapp\Pack\Schema\Value
 */
abstract class AbstractValueLength extends AbstractValue implements ValueLengthInterface
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