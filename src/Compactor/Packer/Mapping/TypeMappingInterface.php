<?php

namespace Subapp\Pack\Compactor\Packer\Mapping;

/**
 * Class TypeMapping
 * @package Subapp\Pack\Compactor\Packer\Mapping
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