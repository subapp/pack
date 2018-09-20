<?php

namespace Subapp\Pack\Schema\Column;

/**
 * Class AbstractDefinition
 * @package Subapp\Pack\Schema\Definition
 */
abstract class AbstractColumn implements ColumnInterface
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
     * @var int
     */
    protected $position = 0;

    /**
     * AbstractValue constructor.
     * @param string $name
     * @param string $column
     * @param integer $position
     */
    public function __construct($name, $column, $position)
    {
        $this->name = $name;
        $this->position = $position;
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

    /**
     * @inheritDoc
     */
    public function getPosition()
    {
        return $this->position;
    }

}