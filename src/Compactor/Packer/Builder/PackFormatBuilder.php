<?php

namespace Subapp\Pack\Compactor\Packer\Builder;

use Subapp\Pack\Compactor\Packer\Mapping\TypeMappingInterface;
use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;
use Subapp\Pack\Compactor\Schema\SchemaInterface;
use Subapp\Pack\Compactor\Schema\SchemaKeeperInterface;
use Subapp\Pack\Compactor\Schema\Type\Type;

/**
 * Class PackFormatBuilder
 * @package Subapp\Pack\Compactor\Packer\Builder
 */
final class PackFormatBuilder
{
    
    /**
     * @var TypeMappingInterface
     */
    private $mapping;
    
    /**
     * PackFormatBuilder constructor.
     * @param TypeMappingInterface $mapping
     */
    public function __construct(TypeMappingInterface $mapping)
    {
        $this->mapping = $mapping;
    }

    /**
     * @param SchemaInterface $schema
     * @return string
     */
    public function getPackFormat(SchemaInterface $schema)
    {
        $format = null;
        
        foreach ($schema->getColumns() as $column) {
            $pattern = ($column instanceof SchemaKeeperInterface)
                ? $this->getPackFormat($column->getSchema())
                : $this->getNormalizedFormat($column);

            $format = sprintf('%s%s', $format, $pattern);
        }

        return $format;
    }

    /**
     * @param SchemaInterface $schema
     * @return string
     */
    public function getUnpackFormat(SchemaInterface $schema)
    {
        $format = null;
        
        foreach ($schema->getColumns() as $column) {
            $pattern = ($column instanceof SchemaKeeperInterface)
                ? $this->getUnpackFormat($column->getSchema())
                : sprintf('%s%s', $this->getNormalizedFormat($column), $column->getName());

            $format = sprintf('%s/%s', $format, $pattern);
        }

        return trim($format, '/');
    }
    
    /**
     * @param ColumnInterface $column
     * @return string
     */
    private function getNormalizedFormat(ColumnInterface $column)
    {
        $format = null;

        if (null !== ($typeName = $column->getTypeName())) {
            $format = $this->getMapping()->getPackFormat($typeName);
            if ($column->getType()->isString() || $column->getType()->isArray()) {
                $length = $column->getLength();
                $format = sprintf('%s%s', $format, $length ? $length : '*');
            }
        }

        return $format;
    }

    /**
     * @return TypeMappingInterface
     */
    public function getMapping()
    {
        return $this->mapping;
    }
    
}