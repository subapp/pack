<?php

namespace Subapp\Pack\Compactor\Hydrator;

use Subapp\Pack\Compactor\Collection\Values;
use Subapp\Pack\Compactor\Collection\ValuesInterface;
use Subapp\Pack\Compactor\Accessor\AccessorInterface;
use Subapp\Pack\Compactor\Factory\AccessorFactory;
use Subapp\Pack\Compactor\Factory\ValueCompactorFactory;
use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;
use Subapp\Pack\Compactor\Schema\Column\ColumnsKeeperInterface;
use Subapp\Pack\Compactor\Schema\SchemaInterface;
use Subapp\Pack\Compactor\Schema\SchemaKeeperInterface;

/**
 * Class Hydrator
 * @package Subapp\Pack\Compactor\Hydrator
 */
class Hydrator extends AbstractHydrator
{
    
    /**
     * @param SchemaInterface $schema
     * @param                 $input
     * @param                 $output
     *
     * @return array|mixed|object
     */
    public function hydrate(SchemaInterface $schema, $input, $output)
    {
        $factory    = $this->getValueCompactorFactory();

        // wrap data into accessor
        list($input, $output) = $this->toAccessor($input, $output);
        
        foreach ($schema->getColumns() as $column) {
            $factory->getValueCompactor($column)->expand($column, $input, $output);
        }
        
        return $output->getSource();
    }
    
    /**
     * @param SchemaInterface $schema
     * @param                 $input
     * @param                 $output
     *
     * @return array|object
     */
    public function extract(SchemaInterface $schema, $input, $output)
    {
        $factory    = $this->getValueCompactorFactory();

        // wrap data into accessor
        list($input, $output) = $this->toAccessor($input, $output);
        
        foreach ($schema->getColumns() as $column) {
            $factory->getValueCompactor($column)->collapse($column, $input, $output);
        }
        
        return $output->getSource();
    }

    /**
     * @param mixed ...$values
     * @return array|AccessorInterface[]
     */
    public function toAccessor(...$values)
    {
        $factory   = $this->getAccessorFactory();

        $accessors = array_map(function ($value) use ($factory) {
            return ($value instanceof AccessorInterface) ? $value : $factory->getAccessor($value);
        }, $values);

        return $accessors;
    }
    
}