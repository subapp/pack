<?php

namespace Subapp\TestApp\Builder;

use Subapp\Pack\Optimizer\Builder\AbstractSchemaBuilder;
use Subapp\Pack\Optimizer\Schema\Column\BitMaskColumn;
use Subapp\Pack\Optimizer\Schema\Column\BooleanColumn;
use Subapp\Pack\Optimizer\Schema\Column\CombinedColumn;
use Subapp\Pack\Optimizer\Schema\Column\IntegerColumn;
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
        $schema->addColumn(new IntegerColumn('id', 'user_id', 500, IntegerColumn::INT32));
        $schema->addColumn(new TimestampColumn('created', 'created_at', 1001));
        $schema->addColumn(new TimestampColumn('updated', 'updated_at', 1002));
    
        $schema->addColumn(new BitMaskColumn('mask', 120,
            new BooleanColumn('is_hotel', 'is_hotel', 1),
            new BooleanColumn('is_user', 'is_user', 0),
            new BooleanColumn('readable', 'is_readable', 1000)
        ));
    
        $schema->addColumn(new CombinedColumn('data1', 30, 32, ';',
            new TimestampColumn('created', 'created_at', 1011),
            new TimestampColumn('updated', 'updated_at', 1001),
            new BooleanColumn('readable', 'is_readable', 1000)
        ));
    }
    
}