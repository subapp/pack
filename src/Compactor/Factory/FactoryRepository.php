<?php

namespace Subapp\Pack\Compactor\Factory;

/**
 * Class FactoryRepository
 * @package Subapp\Pack\Compactor
 */
final class FactoryRepository
{
    
    /**
     * @var array
     */
    private $factories = [];
    
    /**
     * @inheritDoc
     */
    public function __construct()
    {
        $this->initialize();
    }
    
    /**
     * @return void
     */
    private function initialize()
    {
        $this->factories = [
            SchemaBuilderFactory::class => new SchemaBuilderFactory(),
            AccessorFactory::class => new AccessorFactory(),
            ValueTransformerFactory::class => new ValueTransformerFactory(),
        ];
    }
    
    /**
     * @return AccessorFactory
     */
    public function getAccessorFactory()
    {
        return $this->factories[AccessorFactory::class];
    }
    
    /**
     * @return SchemaBuilderFactory
     */
    public function getSchemaBuilderFactory()
    {
        return $this->factories[SchemaBuilderFactory::class];
    }
    
    /**
     * @return ValueTransformerFactory
     */
    public function getValueTransformerFactory()
    {
        return $this->factories[ValueTransformerFactory::class];
    }
    
}