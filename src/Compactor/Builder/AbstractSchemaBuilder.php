<?php

namespace Subapp\Pack\Compactor\Builder;

use Subapp\Pack\Compactor\Schema\Schema;
use Subapp\Pack\Compactor\Schema\SchemaInterface;
use Subapp\Pack\Compactor\Schema\Version;

/**
 * Class AbstractSchemaBuilder
 * @package Subapp\Pack\Compactor\Builder
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