<?php

namespace Subapp\Pack\Schema\Column;

use Subapp\Pack\Schema\Type\Type;

/**
 * Class BooleanValue
 * @package Subapp\Pack\Schema\Column
 */
class BooleanColumn extends AbstractColumn
{
    
    /**
     * @inheritDoc
     */
    public function getPhpType()
    {
        return Type::BOOLEAN;
    }
    
}