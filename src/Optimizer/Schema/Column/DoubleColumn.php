<?php

namespace Subapp\Pack\Optimizer\Schema\Column;

use Subapp\Pack\Optimizer\Schema\Type\Type;

/**
 * Class DoubleColumn
 * @package Subapp\Pack\Optimizer\Schema\Column
 */
class DoubleColumn extends AbstractDoubleNumberColumn
{
    
    /**
     * @inheritDoc
     */
    public function getTypeName()
    {
        return Type::DOUBLE;
    }
    
}