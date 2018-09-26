<?php

namespace Subapp\Pack\Compactor\Schema\Column;

use Subapp\Pack\Compactor\Schema\Type\Type;

/**
 * Class AbstractDefinition
 * @package Subapp\Pack\Compactor\Schema\Definition
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
     * @var integer
     */
    protected $position = 0;
    
    /**
     * @var integer
     */
    protected $length;
    
    /**
     * @var Type
     */
    protected $type;

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
    
    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }
    
    /**
     * @inheritDoc
     */
    public function getType()
    {
        $isInitialized = ($this->type instanceof Type);
        
        if (!$isInitialized) {
            $this->type = $this->retrieveType();
        }
        
        return $this->type;
    }

    /**
     * @param Type $type
     */
    public function setType(Type $type)
    {
        $this->type = $type;
    }
    
    /**
     * @inheritDoc
     */
    public function retrieveType()
    {
        $columnType = Type::retrieveTypeObject($this->getTypeName());
    
        $columnType->setLength($this->getLength());
    
        return $columnType;
    }
    
}