<?php

namespace Subapp\Pack\Optimizer\Schema\Column;

use Subapp\Pack\Optimizer\Schema\Type\Type;

/**
 * Class DatetimeColumn
 * @package Subapp\Pack\Optimizer\Schema\Column
 */
class DatetimeColumn extends AbstractColumnLength
{
    
    /**
     * @inheritDoc
     */
    public function getTypeName()
    {
        return Type::DATETIME;
    }
    
}