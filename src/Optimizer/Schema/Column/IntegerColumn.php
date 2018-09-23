<?php

namespace Subapp\Pack\Optimizer\Schema\Column;

use Subapp\Pack\Optimizer\Schema\Type\Type;

/**
 * Class IntegerValue
 * @package Subapp\Pack\Optimizer\Schema\Column
 */
class IntegerColumn extends AbstractColumnLength
{

    const INT8 = 1;
    const INT16 = 2;
    const INT32 = 4;
    const INT64 = 8;
    
    /**
     * @var array
     */
    private $map = [
        self::INT8 => Type::TINYINT,
        self::INT16 => Type::SMALLINT,
        self::INT32 => Type::INTEGER,
        self::INT64 => Type::BIGINT,
    ];
    
    /**
     * @inheritDoc
     */
    public function getTypeName()
    {
        return $this->map[$this->getLength()];
    }
    
}