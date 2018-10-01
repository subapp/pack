<?php

namespace Subapp\Pack\Compactor\Builder;

use Subapp\Pack\Compactor\Packer\Builder\PackFormatBuilder;
use Subapp\Pack\Compactor\Packer\Mapping\TypeMapping;
use Subapp\Pack\Compactor\Packer\Mapping\TypeMappingInterface;
use Subapp\Pack\Compactor\Packer\Packer;
use Subapp\Pack\Compactor\Packer\PackerInterface;
use Subapp\Pack\Compactor\Packer\PhpPack\PhpPack;
use Subapp\Pack\Compactor\Schema\SchemaInterface;

/**
 * Class PackerBuilder
 * @package Subapp\Pack\Compactor\Builder
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
        $builder = new PackFormatBuilder($mapping ?? new TypeMapping());

        return new Packer($schema, new PhpPack(), $builder);
    }
    
}