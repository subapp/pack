<?php

namespace Subapp\TestApp\Builder;

use Subapp\Pack\Optimizer\Builder\AbstractSchemaBuilder;
use Subapp\Pack\Optimizer\Schema\Column\BitMaskColumn;
use Subapp\Pack\Optimizer\Schema\Column\BooleanColumn;
use Subapp\Pack\Optimizer\Schema\Column\DoubleColumn;
use Subapp\Pack\Optimizer\Schema\Column\FloatColumn;
use Subapp\Pack\Optimizer\Schema\Column\IntegerColumn;
use Subapp\Pack\Optimizer\Schema\Column\StringColumn;
use Subapp\Pack\Optimizer\Schema\Column\TimestampColumn;
use Subapp\Pack\Optimizer\Schema\SchemaInterface;

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
        $schema->addColumn(new IntegerColumn('id', 'userId', IntegerColumn::INT32, 100));
        $schema->addColumn(new TimestampColumn('created', 'created', 10));
        $schema->addColumn(new TimestampColumn('updated', 'updated', 20));
    
        $schema->addColumn(new BitMaskColumn('access', BitMaskColumn::INT16, 110,
            new BooleanColumn('boolean1', 'boolean1', 0),
            new BooleanColumn('boolean2', 'boolean2', 1),
            new BooleanColumn('boolean3', 'boolean3', 2),
            new BooleanColumn('boolean4', 'boolean4', 3),
            new BooleanColumn('boolean5', 'boolean5', 4),
            new BooleanColumn('boolean6', 'boolean6', 5),
            new BooleanColumn('boolean7', 'boolean7', 6),
            new BooleanColumn('boolean8', 'boolean8', 7),
            new BooleanColumn('boolean9', 'boolean9', 8)
        ));
    
        $schema->addColumn(new StringColumn('userName', 'name', 8, 200));
        
        $schema->addColumn(new FloatColumn('f1', 'float1', 30));
        $schema->addColumn(new FloatColumn('f2', 'float2', 40));
        $schema->addColumn(new DoubleColumn('d1', 'double1', 50, 6));
        $schema->addColumn(new DoubleColumn('d2', 'double2', 60, 6));
    }
    
}