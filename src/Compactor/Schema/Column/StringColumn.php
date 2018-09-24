<?php

namespace Subapp\Pack\Compactor\Schema\Column;

use Subapp\Pack\Compactor\Schema\Type\Type;

/**
 * Class StringValue
 * @package Subapp\Pack\Compactor\Schema\Definition
 */
class StringColumn extends AbstractColumnLength
{
    
    /**
     * @inheritDoc
     */
    public function getTypeName()
    {
        return Type::STRING;
    }
    
}