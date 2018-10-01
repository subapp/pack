<?php

namespace Subapp\Pack\Compactor\Schema\Column;

use Subapp\Pack\Compactor\Schema\SchemaInterface;
use Subapp\Pack\Compactor\Schema\SchemaKeeperInterface;

/**
 * Class SchemaColumn
 * @package Subapp\Pack\Compactor\Schema\Column
 */
class SchemaColumn extends AbstractColumnLength implements SchemaKeeperInterface
{
    
    /**
     * @var SchemaInterface
     */
    private $schema;
    
    /**
     * @inheritDoc
     */
    public function __construct($name, $column, SchemaInterface $schema, $position)
    {
        parent::__construct($name, $column, $schema->getByteSize(), $position);
        
        foreach ($schema->getColumns() as $inner) {
            $inner->setName(sprintf('%s_%s', $name, $inner->getName()));
        }
    
        $this->schema = $schema;
    }
    
    /**
     * @inheritDoc
     */
    public function getTypeName()
    {
        return null;
    }
    
    /**
     * @return SchemaInterface
     */
    public function getSchema()
    {
        return $this->schema;
    }
    
}