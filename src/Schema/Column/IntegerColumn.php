<?php

namespace Subapp\Pack\Schema\Column;

use Subapp\Pack\Schema\Type\Type;

/**
 * Class IntegerValue
 * @package Subapp\Pack\Schema\Column
 */
class IntegerColumn extends AbstractColumnLength
{

    const INT8 = 1;
    const INT16 = 2;
    const INT32 = 4;
    
    /**
     * @inheritDoc
     */
    public function getPhpType()
    {
        return Type::INTEGER;
    }
    
}