<?php

namespace Subapp\TestApp\Setup;

use Subapp\Pack\Compactor\Builder\AbstractSchemaBuilder;
use Subapp\Pack\Compactor\Schema\Column\IntegerColumn;
use Subapp\Pack\Compactor\Schema\Column\StringColumn;
use Subapp\Pack\Compactor\Schema\SchemaInterface;

/**
 * Class SchemaBuilderVersion00001
 * @package Subapp\TestApp\Setup
 */
class SchemaBuilderVersion00001 extends AbstractSchemaBuilder
{
    
    /**
     * @inheritDoc
     */
    protected function doBuildSchema(SchemaInterface $schema)
    {
        $schema->addColumn(new IntegerColumn('v', 'v', IntegerColumn::INT16, 100));
        $schema->addColumn(new StringColumn('_', '_', null, 100));
    }
    
}