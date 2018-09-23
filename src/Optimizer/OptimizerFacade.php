<?php

namespace Subapp\Pack\Optimizer;

use Subapp\Pack\Optimizer\Hydrator\Hydrator;
use Subapp\Pack\Optimizer\Schema\Version;
use Subapp\Pack\Runtime\Config\ConfigParameters;

/**
 * Class OptimizerFacade
 * @package Subapp\Pack\Optimizer
 */
class OptimizerFacade
{
    
    /**
     * @var FactoryRepository
     */
    private $factories;
    
    /**
     * @var ConfigParameters
     */
    private $parameters;
    
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
     * @return Schema\SchemaInterface
     */
    public function loadSchema(Version $version, $namespace = null)
    {
        $factory = $this->factories->getSchemaBuilderFactory();
        $builder = $factory->getSchemaBuilder($version, $namespace ?? $this->parameters->getDefaultNamespace());
        
        return $builder->getSchema();
    }
    
    public function extractTo()
    {
    
    }
    
    /**
     * @param array|object $inputData
     * @param array|object $outputData
     * @return array|object
     */
    public function hydrateTo($inputData, $outputData)
    {
        $factory = $this->getFactories()->getAccessorFactory();
        
        $input = $factory->getAccessor($inputData);
        $output = $factory->getAccessor($outputData);
        
        $hydrator = new Hydrator();
    
        $hydrator->hydrate($input, $output);
        
        return $output->getSource();
    }
    
    /**
     * @return FactoryRepository
     */
    public function getFactories()
    {
        return $this->factories;
    }
    
}