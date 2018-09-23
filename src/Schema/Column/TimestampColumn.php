<?php

namespace Subapp\Pack\Schema\Column;

use Subapp\Pack\Schema\Type\Type;

/**
 * Class TimestampColumn
 * @package Subapp\Pack\Schema\Column
 */
class TimestampColumn extends AbstractColumnLength
{
    
    /**
     * @inheritDoc
     */
    public function getPhpType()
    {
        return Type::TIMESTAMP;
    }
    
}