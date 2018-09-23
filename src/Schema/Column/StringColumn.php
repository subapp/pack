<?php

namespace Subapp\Pack\Schema\Column;

use Subapp\Pack\Schema\Type\Type;

/**
 * Class StringValue
 * @package Subapp\Pack\Schema\Definition
 */
class StringColumn extends AbstractColumnLength
{
    
    /**
     * @inheritDoc
     */
    public function getPhpType()
    {
        return Type::STRING;
    }
    
}