<?php

namespace Subapp\Pack\Hydrator;

use Subapp\Pack\Collection\Values;
use Subapp\Pack\Collection\ValuesInterface;
use Subapp\Pack\Accessor\AccessorInterface;
use Subapp\Pack\Factory\ValueTransformerFactory;
use Subapp\Pack\Schema\SchemaInterface;

/**
 * Class Hydrator
 * @package Subapp\Pack\Hydrator
 */
class Hydrator implements HydratorInterface
{
    
    /**
     * @var SchemaInterface
     */
    private $schema;
    
    /**
     * @var ValueTransformerFactory
     */
    private $factory;
    
    /**
     * DataHydrator constructor.
     * @param SchemaInterface $schema
     */
    public function __construct(SchemaInterface $schema)
    {
        $this->schema = $schema;
        $this->factory = new ValueTransformerFactory();
    }
    
    
    /**
     * @param AccessorInterface $input
     * @param AccessorInterface $output
     *
     * @return array|object
     */
    public function hydrate(AccessorInterface $input, AccessorInterface $output)
    {
        $factory = $this->getFactory();
        $columns = $this->getSchema()->getColumns();
    
        foreach ($columns as $column) {
            $processor = $factory->getSharedTransformer($column);
            $processor->expand($column, $input, $output);
        }
        
        return $output->getSource();
    }
    
    /**
     * @param AccessorInterface $input
     * @param AccessorInterface $output
     *
     * @return array|object
     */
    public function extract(AccessorInterface $input, AccessorInterface $output)
    {
        $factory = $this->getFactory();
        $columns = $this->getSchema()->getColumns();
    
        foreach ($columns as $column) {
            $processor = $factory->getSharedTransformer($column);
            $processor->collapse($column, $input, $output);
        }
        
        return $output->getSource();
    }

    /**
     * @return ValueTransformerFactory
     */
    public function getFactory()
    {
        return $this->factory;
    }
    
    /**
     * @return SchemaInterface
     */
    public function getSchema()
    {
        return $this->schema;
    }
    
}