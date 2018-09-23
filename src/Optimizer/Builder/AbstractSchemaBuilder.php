<?php

namespace Subapp\Pack\Optimizer\Builder;

use Subapp\Pack\Optimizer\Schema\Schema;
use Subapp\Pack\Optimizer\Schema\SchemaInterface;
use Subapp\Pack\Optimizer\Schema\Version;

/**
 * Class AbstractSchemaBuilder
 * @package Subapp\Pack\Optimizer\Builder
 */
abstract class AbstractSchemaBuilder implements SchemaBuilderInterface
{
    
    /**
     * @var SchemaInterface
     */
    private $schema;
    
    /**
     * @var boolean
     */
    private $initialized = false;
    
    /**
     * AbstractSchemaBuilder constructor.
     * @param Version $version
     */
    public function __construct(Version $version)
    {
        $this->schema = new Schema($version);
    }
    
    /**
     * @return Version
     */
    public function getVersion()
    {
        return $this->getSchema()->getVersion();
    }
    
    /**
     * @return SchemaInterface
     */
    public function getSchema()
    {
        $this->buildSchema();
        
        return $this->schema;
    }
    
    /**
     * @inheritDoc
     */
    public function buildSchema()
    {
        if (!$this->initialized) {
            $this->initialized = true;
            $this->doBuildSchema($this->schema);
        }
    }
    
    /**
     * @param SchemaInterface $schema
     * @return void
     */
    abstract protected function doBuildSchema(SchemaInterface $schema);
    
}