<?php

namespace Subapp\Pack\Compactor\Schema\Column;

use Subapp\Pack\Compactor\Schema\Type\Type;

/**
 * Class TimestampColumn
 * @package Subapp\Pack\Compactor\Schema\Column
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