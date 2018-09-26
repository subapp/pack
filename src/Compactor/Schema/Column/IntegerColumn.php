<?php

namespace Subapp\Pack\Compactor\Schema\Column;

use Subapp\Pack\Compactor\Schema\Type\Type;

/**
 * Class IntegerValue
 * @package Subapp\Pack\Compactor\Schema\Column
 */
class IntegerColumn extends AbstractColumnLength
{

    const INT_8         = 1;
    const INT_16        = 2;
    const INT_32        = 4;
    const INT_64        = 8;
    const U_INT_8       = 16;
    const U_INT_16      = 32;
    const U_INT_32      = 64;
    const U_INT_64      = 128;
    
    /**
     * @var array
     */
    private $map = [
        self::INT_8 => Type::TINYINT,
        self::INT_16 => Type::SMALLINT,
        self::INT_32 => Type::INTEGER,
        self::INT_64 => Type::BIGINT,
    ];
    
    /**
     * @inheritDoc
     */
    public function getTypeName()
    {
        return $this->map[$this->getLength()];
    }
    
}