<?php

namespace Subapp\Pack\Optimizer\Packer\Mapping;

use Subapp\Pack\Optimizer\Schema\Type\Type;

/**
 * Class TypeMapping
 * @package Subapp\Pack\Optimizer\Packer\Mapping
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
        Type::SMALLINT => 'S',
        Type::TINYINT => 'C',
        Type::BOOLEAN => 'c',
        Type::CHAR => 'C',
        Type::DOUBLE => 'd',
        Type::FLOAT => 'f',
        Type::STRING => 'a',
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
    
    /**
     * @param string $typeName
     * @return boolean
     */
    public function isStringType($typeName)
    {
        return in_array($typeName, [Type::DATETIME, Type::STRING, Type::CHAR,], true);
    }
    
}