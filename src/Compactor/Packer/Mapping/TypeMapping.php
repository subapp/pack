<?php

namespace Subapp\Pack\Compactor\Packer\Mapping;

use Subapp\Pack\Compactor\Schema\Type\Type;

/**
 * Class TypeMapping
 * @package Subapp\Pack\Compactor\Packer\Mapping
 */
class TypeMapping implements TypeMappingInterface
{
    
    /**
     * @var array
     */
    private $map = [
        Type::BIGINT => 'L',
        Type::INTEGER => 'I',
        Type::TIMESTAMP => 'I',
        Type::BOOLEAN_LIST => 'I',
        Type::SMALLINT => 'S',
        Type::TINYINT => 'C',
        Type::BOOLEAN => 'c',
        Type::CHAR => 'C',
        Type::DOUBLE => 'd',
        Type::FLOAT => 'f',
        Type::STRING => 'a',
        Type::JSON => 'a',
        Type::DATETIME => 'a',
    ];
    
    /**
     * @param $type
     * @return mixed|null
     */
    public function getPackFormat($type)
    {
        return $this->map[$type] ?? null;
    }
    
}