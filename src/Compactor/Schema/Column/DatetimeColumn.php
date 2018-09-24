<?php

namespace Subapp\Pack\Compactor\Schema\Column;

use Subapp\Pack\Compactor\Schema\Type\Type;

/**
 * Class DatetimeColumn
 * @package Subapp\Pack\Compactor\Schema\Column
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