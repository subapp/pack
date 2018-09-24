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
     * ReduceCompactor constructor.
     * @param SchemaInterface $schema
     */
    public function __construct(SchemaInterface $schema)
    {
        $this->hydrator = new Hydrator($schema);
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
        $collection = new Values();

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

}