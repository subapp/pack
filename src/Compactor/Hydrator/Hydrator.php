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
        $accessor   = $this->getAccessorFactory();
        // wrap data into accessor
        $output     = $accessor->getAccessor($output);
        $input      = $accessor->getAccessor($input);
        
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
        $accessor   = $this->getAccessorFactory();
        // wrap data into accessor
        $input      = $accessor->getAccessor($input);
        $output     = $accessor->getAccessor($output);
        
        foreach ($schema->getColumns() as $column) {
            $factory->getValueCompactor($column)->collapse($column, $input, $output);
        }
        
        return $output->getSource();
    }
    
}