<?php

namespace Subapp\Pack\Optimizer\Packer\Builder;

use Subapp\Pack\Optimizer\Packer\Mapping\TypeMappingInterface;
use Subapp\Pack\Optimizer\Schema\Column\ColumnInterface;
use Subapp\Pack\Optimizer\Schema\SchemaInterface;
use Subapp\Pack\Optimizer\Schema\Type\Type;

/**
 * Class PackFormatBuilder
 * @package Subapp\Pack\Optimizer\Packer\Builder
 */
final class PackFormatBuilder
{
    
    /**
     * @var SchemaInterface
     */
    private $schema;
    
    /**
     * @var TypeMappingInterface
     */
    private $mapping;
    
    /**
     * PackFormatBuilder constructor.
     * @param SchemaInterface      $schema
     * @param TypeMappingInterface $mapping
     */
    public function __construct(SchemaInterface $schema, TypeMappingInterface $mapping)
    {
        $this->schema = $schema;
        $this->mapping = $mapping;
    }
    
    /**
     * @return string
     */
    public function getPackFormat()
    {
        $format = null;
        $schema = $this->getSchema();
        
        foreach ($schema->getColumns() as $column) {
            $format = sprintf('%s%s', $format, $this->getNormalizedPackFormat($column));
        }
        
        return $format;
    }
    
    /**
     * @return string
     */
    public function getUnpackFormat()
    {
        $format = null;
        $schema = $this->getSchema();
        
        foreach ($schema->getColumns() as $column) {
            $format = sprintf('%s/%s%s', $format, $this->getNormalizedPackFormat($column), $column->getName());
        }
        
        return trim($format, '/');
    }
    
    /**
     * @param ColumnInterface $column
     * @return string
     */
    private function getNormalizedPackFormat(ColumnInterface $column)
    {
        $mapping = $this->getMapping();
        $format = $mapping->getPackFormat($column->getTypeName());
        $isString = in_array($column->getTypeName(), [Type::DATETIME, Type::STRING, Type::CHAR,]);
        
        if ($isString && $column->getLength()) {
            $format = sprintf('%s%d', $format, $column->getLength());
        }
        
        return $format;
    }
    
    /**
     * @return SchemaInterface
     */
    public function getSchema()
    {
        return $this->schema;
    }
    
    /**
     * @return TypeMappingInterface
     */
    public function getMapping()
    {
        return $this->mapping;
    }
    
}