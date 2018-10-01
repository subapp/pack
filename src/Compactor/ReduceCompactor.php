<?php

namespace Subapp\Pack\Compactor;

use Subapp\Pack\Compactor\Collection\Values;
use Subapp\Pack\Compactor\Factory\AccessorFactory;
use Subapp\Pack\Compactor\Hydrator\Hydrator;
use Subapp\Pack\Compactor\Hydrator\HydratorInterface;
use Subapp\Pack\Compactor\Schema\SchemaInterface;

/**
 * Class ReduceCompactor
 * @package Subapp\Pack\Compactor
 */
class ReduceCompactor implements CompactorInterface
{
    
    /**
     * @var SchemaInterface
     */
    private $schema;
    
    /**
     * @var HydratorInterface
     */
    private $hydrator;

    /**
     * @var string
     */
    private $class;

    /**
     * ReduceCompactor constructor.
     * @param SchemaInterface $schema
     * @param string|null $class
     */
    public function __construct(SchemaInterface $schema, $class = null)
    {
        $this->schema = $schema;
        $this->hydrator = new Hydrator();
        $this->class = $class;
    }

    /**
     * @inheritDoc
     */
    public function compact($values)
    {
        $collection = new Values();

        $this->hydrator->extract($this->getSchema(), $values, $collection);

        return $collection;
    }

    /**
     * @inheritDoc
     */
    public function extend($compacted)
    {
        $collection = $this->createOutputObject();

        $this->hydrator->hydrate($this->getSchema(), $compacted, $collection);

        return $collection;
    }

    /**
     * @return HydratorInterface
     */
    public function getHydrator()
    {
        return $this->hydrator;
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }
    
    /**
     * @return SchemaInterface
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * @return Values|object
     */
    private function createOutputObject()
    {
        return class_exists($class = $this->getClass()) ? new $class() : new Values();
    }

}