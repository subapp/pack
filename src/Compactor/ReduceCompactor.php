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
     * @var HydratorInterface
     */
    private $hydrator;

    /**
     * @var AccessorFactory
     */
    private $accessor;

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
        $this->hydrator = new Hydrator($schema);
        $this->class = $class;
        $this->accessor = new AccessorFactory();
    }

    /**
     * @inheritDoc
     */
    public function compact($values)
    {
        $factory = $this->getAccessorFactory();
        $collection = new Values();

        $this->hydrator->extract($factory->getAccessor($values), $factory->getAccessor($collection));

        return $collection;
    }

    /**
     * @inheritDoc
     */
    public function extend($compacted)
    {
        $factory = $this->getAccessorFactory();
        $collection = $this->createOutputObject();

        $this->hydrator->hydrate($factory->getAccessor($compacted), $factory->getAccessor($collection));

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
     * @return AccessorFactory
     */
    public function getAccessorFactory()
    {
        return $this->accessor;
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @return Values|object
     */
    private function createOutputObject()
    {
        return class_exists($class = $this->getClass()) ? new $class() : new Values();
    }

}