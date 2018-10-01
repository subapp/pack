<?php

namespace Subapp\Pack\Compactor\Packer;

use Subapp\Pack\Compactor\Collection\ValuesInterface;
use Subapp\Pack\Compactor\Packer\Builder\PackFormatBuilder;
use Subapp\Pack\Compactor\Packer\PhpPack\PhpPackInterface;
use Subapp\Pack\Compactor\Schema\SchemaInterface;

/**
 * Class Packer
 * @package Subapp\Pack\Compactor\Packer
 */
class Packer implements PackerInterface
{
    
    /**
     * @var PhpPackInterface
     */
    private $pack;
    
    /**
     * @var PackFormatBuilder
     */
    private $builder;

    /**
     * @var SchemaInterface
     */
    private $schema;

    /**
     * Packer constructor.
     * @param SchemaInterface $schema
     * @param PhpPackInterface $pack
     * @param PackFormatBuilder $builder
     */
    public function __construct(SchemaInterface $schema, PhpPackInterface $pack, PackFormatBuilder $builder)
    {
        $this->schema = $schema;
        $this->pack = $pack;
        $this->builder = $builder;
    }
    
    /**
     * @inheritDoc
     */
    public function pack(ValuesInterface $values)
    {
        $pattern = $this->builder->getPackFormat($this->getSchema());

        return $this->pack->pack($pattern, ...array_values($values->toArray()));
    }
    
    /**
     * @inheritDoc
     */
    public function unpack($value, ValuesInterface $values)
    {
        $pattern = $this->builder->getUnpackFormat($this->getSchema());
        
        $unpacked = $this->pack->unpack($pattern, $value);
        $unpacked = $this->removeNullBytes($unpacked);

        $values->batch($unpacked);
    }

    /**
     * @return PhpPackInterface
     */
    public function getPack()
    {
        return $this->pack;
    }

    /**
     * @return PackFormatBuilder
     */
    public function getBuilder()
    {
        return $this->builder;
    }

    /**
     * @return SchemaInterface
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * @param array $values
     * @return array
     */
    private function removeNullBytes(array $values)
    {
        return array_map(function ($value) {
            return is_string($value) ? trim($value) : $value;
        }, $values);
    }
    
}