<?php

namespace Subapp\Pack\Optimizer\Schema\Column;

use Subapp\Pack\Optimizer\Schema\Type\Type;

/**
 * Class FloatColumn
 * @package Subapp\Pack\Optimizer\Schema\Column
 */
class FloatColumn extends AbstractDoubleNumberColumn
{
    
    /**
     * @inheritDoc
     */
    public function getTypeName()
    {
        return Type::FLOAT;
    }
    
}