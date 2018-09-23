<?php

namespace Subapp\Pack\Optimizer\Builder;

use Subapp\Pack\Optimizer\Packer\Builder\PackFormatBuilder;
use Subapp\Pack\Optimizer\Packer\Mapping\TypeMapping;
use Subapp\Pack\Optimizer\Packer\Mapping\TypeMappingInterface;
use Subapp\Pack\Optimizer\Packer\Packer;
use Subapp\Pack\Optimizer\Packer\PackerInterface;
use Subapp\Pack\Optimizer\Packer\PhpPack\PhpPack;
use Subapp\Pack\Optimizer\Schema\SchemaInterface;

/**
 * Class PackerBuilder
 * @package Subapp\Pack\Optimizer\Builder
 */
class PackerBuilder implements PackerBuilderInterface
{
    
    /**
     * @param SchemaInterface           $schema
     * @param TypeMappingInterface|null $mapping
     * @return PackerInterface
     */
    public function getPacker(SchemaInterface $schema, TypeMappingInterface $mapping = null)
    {
        $mapping = ($mapping ?? new TypeMapping());
        $builder = new PackFormatBuilder($schema, $mapping);

        return new Packer(new PhpPack(), $builder);
    }
    
}