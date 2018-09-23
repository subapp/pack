<?php

namespace Subapp\Pack\Optimizer\Schema\Column;

use Subapp\Pack\Optimizer\Schema\Type\Type;

/**
 * Class BooleanValue
 * @package Subapp\Pack\Optimizer\Schema\Column
 */
class BooleanColumn extends AbstractColumn
{
    
    /**
     * @inheritDoc
     */
    public function getTypeName()
    {
        return Type::BOOLEAN;
    }
    
}