<?php

namespace Subapp\Pack\Compactor\Hydrator;

use Subapp\Pack\Compactor\Collection\Values;
use Subapp\Pack\Compactor\Collection\ValuesInterface;
use Subapp\Pack\Compactor\Accessor\AccessorInterface;
use Subapp\Pack\Compactor\Factory\ValueCompactorFactory;
use Subapp\Pack\Compactor\Schema\SchemaInterface;

/**
 * Class Hydrator
 * @package Subapp\Pack\Compactor\Hydrator
 */
class Hydrator implements HydratorInterface
{
    
    /**
     * @var SchemaInterface
     */
    private $schema;
    
    /**
     * @var ValueCompactorFactory
     */
    private $factory;
    
    /**
     * DataHydrator constructor.
     * @param SchemaInterface $schema
     */
    public function __construct(SchemaInterface $schema)
    {
        $this->schema = $schema;
        $this->factory = new ValueCompactorFactory($this);
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
            $processor = $factory->getValueCompactor($column);
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
            $processor = $factory->getValueCompactor($column);
            $processor->collapse($column, $input, $output);
        }
        
        return $output->getSource();
    }

    /**
     * @return ValueCompactorFactory
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