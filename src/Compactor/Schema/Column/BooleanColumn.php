<?php

namespace Subapp\Pack\Compactor\Schema\Column;

use Subapp\Pack\Compactor\Schema\Type\Type;

/**
 * Class BooleanValue
 * @package Subapp\Pack\Compactor\Schema\Column
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