<?php

namespace Subapp\Pack\Optimizer;

use Subapp\Pack\Optimizer\Builder\PackerBuilder;
use Subapp\Pack\Optimizer\Collection\Values;
use Subapp\Pack\Optimizer\Hydrator\Hydrator;
use Subapp\Pack\Optimizer\Hydrator\HydratorInterface;
use Subapp\Pack\Optimizer\Packer\PackerInterface;
use Subapp\Pack\Optimizer\Schema\SchemaInterface;
use Subapp\Pack\Optimizer\Schema\Version;
use Subapp\Pack\Runtime\Config\ConfigParameters;
use Subapp\Pack\Runtime\Config\ConfigParametersInterface;

/**
 * Class Facade
 * @package Subapp\Pack\Optimizer
 */
class Facade
{
    
    /**
     * @var boolean
     */
    private $initialized = false;
    
    /**
     * @var SchemaInterface
     */
    private $schema;
    
    /**
     * @var FactoryRepository
     */
    private $factories;
    
    /**
     * @var ConfigParametersInterface
     */
    private $parameters;
    
    /**
     * @var PackerInterface
     */
    private $packer;
    
    /**
     * @var HydratorInterface
     */
    private $hydrator;
    
    /**
     * @inheritDoc
     */
    public function __construct(ConfigParameters $parameters)
    {
        $this->parameters = $parameters;
        $this->factories = new FactoryRepository();
    }
    
    /**
     * @param Version $version
     * @param string  $namespace
     */
    public function initialize(Version $version, $namespace = null)
    {
        if (!$this->initialized) {
            $factory = $this->getFactories()->getSchemaBuilderFactory();
            $packerBuilder = new PackerBuilder();
            $schemaBuilder = $factory->getSchemaBuilder($version, $namespace ?? $this->parameters->getDefaultNamespace());
    
            $this->setSchema($schemaBuilder->getSchema());
            $this->setPacker($packerBuilder->getPacker($this->getSchema()));
            $this->setHydrator(new Hydrator($this->getSchema()));
        }
    }
    
    /**
     * @param array|object $source
     * @param array|object $values
     * @return array|object
     */
    public function extract($source, $values)
    {
        return $this->getHydrator()->extract($this->getAccessor($source), $this->getAccessor($values));
    }
    
    /**
     * @param array|object $source
     * @param array|object $values
     * @return array|object
     */
    public function hydrate($source, $values)
    {
        return $this->getHydrator()->hydrate($this->getAccessor($source), $this->getAccessor($values));
    }
    
    /**
     * @param $source
     * @return string
     */
    public function pack($source)
    {
        $packer = $this->getPacker();
        $values = new Values();
        
        $this->extract($source, $values);
        
        return $packer->pack($values);
    }
    
    /**
     * @param string $packed
     * @param null   $entity
     * @return Values
     */
    public function unpack($packed, $entity = null)
    {
        $packer = $this->getPacker();
        $values = new Values();
        
        $packer->unpack($packed, $values);
        $this->hydrate($values, $entity ?? new \stdClass());
        
        return $entity;
    }
    
    /**
     * @param $value
     * @return Accessor\AccessorInterface
     */
    public function getAccessor($value)
    {
        $factory = $this->getFactories()->getAccessorFactory();
    
        return $factory->getAccessor($value);
    }
    
    /**
     * @return FactoryRepository
     */
    public function getFactories()
    {
        return $this->factories;
    }
    
    /**
     * @return SchemaInterface
     */
    public function getSchema()
    {
        return $this->schema;
    }
    
    /**
     * @param SchemaInterface $schema
     */
    public function setSchema(SchemaInterface $schema)
    {
        $this->schema = $schema;
    }
    
    /**
     * @return PackerInterface
     */
    public function getPacker()
    {
        return $this->packer;
    }
    
    /**
     * @param PackerInterface $packer
     */
    public function setPacker(PackerInterface $packer)
    {
        $this->packer = $packer;
    }
    
    /**
     * @return HydratorInterface
     */
    public function getHydrator()
    {
        return $this->hydrator;
    }
    
    /**
     * @param HydratorInterface $hydrator
     */
    public function setHydrator(HydratorInterface $hydrator)
    {
        $this->hydrator = $hydrator;
    }
    
}