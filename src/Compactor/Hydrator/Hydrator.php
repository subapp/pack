<?php

namespace Subapp\Pack\Compactor\Hydrator;

use Subapp\Pack\Compactor\Schema\SchemaInterface;

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
    
}