<?php

namespace Subapp\Pack\Schema\Value;

/**
 * Class AbstractDefinition
 * @package Subapp\Pack\Schema\Definition
 */
abstract class AbstractValue implements ValueInterface
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $column;

    /**
     * AbstractValue constructor.
     * @param string $name
     * @param string $column
     */
    public function __construct($name, $column)
    {
        $this->name = $name;
        $this->column = $column;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function getColumnName()
    {
        return $this->column;
    }

}