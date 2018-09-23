<?php

namespace Subapp\Pack\Optimizer\Schema\Column;

use Subapp\Pack\Optimizer\Schema\Type\Type;

/**
 * Class StringValue
 * @package Subapp\Pack\Optimizer\Schema\Definition
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