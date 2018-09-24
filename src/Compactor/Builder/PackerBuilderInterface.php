<?php

namespace Subapp\Pack\Compactor\Builder;

use Subapp\Pack\Compactor\Packer\Mapping\TypeMappingInterface;
use Subapp\Pack\Compactor\Packer\PackerInterface;
use Subapp\Pack\Compactor\Schema\SchemaInterface;

/**
 * Class PackerBuilder
 * @package Subapp\Pack\Compactor\Builder
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