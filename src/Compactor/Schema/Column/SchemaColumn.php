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
     * @var string
     */
    private $keySeparator;

    /**
     * @inheritDoc
     */
    public function __construct($name, $column, SchemaInterface $schema, $keySeparator, $position)
    {
        parent::__construct($name, $column, $schema->getByteSize(), $position);

        $this->schema = $schema;
        $this->keySeparator = $keySeparator;
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
        $schema = clone($this->schema);

        foreach ($schema->getColumns() as $inner) {
            $inner->setName(sprintf('%s%s%s', $this->getName(), $this->getKeySeparator(), $inner->getName()));
        }

        return $schema;
    }

    /**
     * @return string
     */
    public function getKeySeparator()
    {
        return $this->keySeparator;
    }

    /**
     * @param string $keySeparator
     */
    public function setKeySeparator($keySeparator)
    {
        $this->keySeparator = $keySeparator;
    }
    
}