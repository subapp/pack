<?php

namespace Subapp\TestApp\Builder;

use Subapp\Pack\Compactor\Builder\AbstractSchemaBuilder;
use Subapp\Pack\Compactor\Schema\Column\BitMaskColumn;
use Subapp\Pack\Compactor\Schema\Column\BooleanColumn;
use Subapp\Pack\Compactor\Schema\Column\DoubleColumn;
use Subapp\Pack\Compactor\Schema\Column\FloatColumn;
use Subapp\Pack\Compactor\Schema\Column\IntegerColumn;
use Subapp\Pack\Compactor\Schema\Column\StringColumn;
use Subapp\Pack\Compactor\Schema\Column\TimestampColumn;
use Subapp\Pack\Compactor\Schema\SchemaInterface;

/**
 * Class SchemaBuilderVersion10001
 * @package Subapp\TestApp\Builder
 */
class SchemaBuilderVersion10001 extends AbstractSchemaBuilder
{
    
    /**
     * @inheritDoc
     */
    protected function doBuildSchema(SchemaInterface $schema)
    {
        $schema->addColumn(new IntegerColumn('id', 'userId', IntegerColumn::INT_32, 100));
        $schema->addColumn(new TimestampColumn('created', 'created', 10));
        $schema->addColumn(new TimestampColumn('updated', 'updated', 20));
    
        $schema->addColumn(new BitMaskColumn('access', BitMaskColumn::INT_16, 110,
            new BooleanColumn('b1', 'boolean1', 0),
            new BooleanColumn('b2', 'boolean2', 1),
            new BooleanColumn('b3', 'boolean3', 2),
            new BooleanColumn('b4', 'boolean4', 3),
            new BooleanColumn('b5', 'boolean5', 4),
            new BooleanColumn('b6', 'boolean6', 5),
            new BooleanColumn('b7', 'boolean7', 6),
            new BooleanColumn('b8', 'boolean8', 7),
            new BooleanColumn('b9', 'boolean9', 8)
        ));
    
        $schema->addColumn(new StringColumn('userName', 'name', 8, 200));
        
        $schema->addColumn(new FloatColumn('f1', 'float1', 3, 30));
        $schema->addColumn(new FloatColumn('f2', 'float2', 3, 40));
        $schema->addColumn(new DoubleColumn('d1', 'double1', 3, 50));
        $schema->addColumn(new DoubleColumn('d2', 'double2', 3, 60));
    }
    
}