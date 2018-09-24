<?php

namespace Subapp\Pack\Compactor\Schema\Column;

use Subapp\Pack\Compactor\Schema\Type\Type;

/**
 * Class DoubleColumn
 * @package Subapp\Pack\Compactor\Schema\Column
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