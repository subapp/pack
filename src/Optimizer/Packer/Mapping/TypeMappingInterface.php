<?php

namespace Subapp\Pack\Optimizer\Packer\Mapping;

/**
 * Class TypeMapping
 * @package Subapp\Pack\Optimizer\Packer\Mapping
 */
interface TypeMappingInterface
{
    
    /**
     * @param $type
     * @return string
     */
    public function getPackFormat($type);
    
    /**
     * @param string $typeName
     * @return boolean
     */
    public function isStringType($typeName);
    
}