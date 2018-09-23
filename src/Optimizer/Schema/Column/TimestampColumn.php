<?php

namespace Subapp\Pack\Optimizer\Schema\Column;

use Subapp\Pack\Optimizer\Schema\Type\Type;

/**
 * Class TimestampColumn
 * @package Subapp\Pack\Optimizer\Schema\Column
 */
class TimestampColumn extends AbstractColumnLength
{
    
    /**
     * @inheritDoc
     */
    public function __construct($name, $column, $position)
    {
        parent::__construct($name, $column, IntegerColumn::INT32, $position);
    }
    
    /**
     * @inheritDoc
     */
    public function getTypeName()
    {
        return Type::TIMESTAMP;
    }
    
}