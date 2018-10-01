<?php

namespace Subapp\Pack\Compactor\Hydrator;

use Subapp\Pack\Compactor\Accessor\AccessorInterface;
use Subapp\Pack\Compactor\Factory\AccessorFactory;
use Subapp\Pack\Compactor\Factory\ValueCompactorFactory;
use Subapp\Pack\Compactor\Schema\SchemaInterface;

/**
 * Interface NormalizerInterface
 * @package Subapp\Pack\Compactor\Hydrator
 */
interface HydratorInterface
{
    
    /**
     * @param SchemaInterface   $schema
     * @param $input
     * @param $output
     * @return mixed
     */
    public function hydrate(SchemaInterface $schema, $input, $output);
    
    /**
     * @param SchemaInterface   $schema
     * @param $input
     * @param $output
     * @return mixed
     */
    public function extract(SchemaInterface $schema, $input, $output);
    
    /**
     * @return ValueCompactorFactory
     */
    public function getValueCompactorFactory();
    
    /**
     * @return AccessorFactory
     */
    public function getAccessorFactory();

    /**
     * @param mixed ...$values
     * @return array|AccessorInterface[]
     */
    public function toAccessor(...$values);

}