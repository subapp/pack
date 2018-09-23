<?php

namespace Subapp\Pack\Schema\Column;

use Subapp\Pack\Schema\Type\Type;

/**
 * Class DatetimeColumn
 * @package Subapp\Pack\Schema\Column
 */
class DatetimeColumn extends AbstractColumnLength
{
    
    /**
     * @inheritDoc
     */
    public function getPhpType()
    {
        return Type::DATETIME;
    }
    
}