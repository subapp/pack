<?php

namespace Subapp\Pack\Optimizer\Builder;

use Subapp\Pack\Optimizer\Packer\Mapping\TypeMappingInterface;
use Subapp\Pack\Optimizer\Packer\PackerInterface;
use Subapp\Pack\Optimizer\Schema\SchemaInterface;

/**
 * Class PackerBuilder
 * @package Subapp\Pack\Optimizer\Builder
 */
interface PackerBuilderInterface
{
    
    /**
     * @param SchemaInterface           $schema
     * @param TypeMappingInterface|null $mapping
     * @return PackerInterface
     */
    public function getPacker(SchemaInterface $schema, TypeMappingInterface $mapping = null);
    
}