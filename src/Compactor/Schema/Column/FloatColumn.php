<?php

namespace Subapp\Pack\Compactor\Schema\Column;

use Subapp\Pack\Compactor\Schema\Type\Type;

/**
 * Class FloatColumn
 * @package Subapp\Pack\Compactor\Schema\Column
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