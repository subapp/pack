<?php

namespace Subapp\Pack\Tests\Mock\Builder;

use Subapp\Pack\Compactor\Builder\AbstractSchemaBuilder;
use Subapp\Pack\Compactor\Schema\Column\BitMaskColumn;
use Subapp\Pack\Compactor\Schema\Column\BooleanColumn;
use Subapp\Pack\Compactor\Schema\Column\DoubleColumn;
use Subapp\Pack\Compactor\Schema\Column\FloatColumn;
use Subapp\Pack\Compactor\Schema\Column\IntegerColumn;
use Subapp\Pack\Compactor\Schema\Column\JsonColumn;
use Subapp\Pack\Compactor\Schema\Column\StringColumn;
use Subapp\Pack\Compactor\Schema\Column\TimestampColumn;
use Subapp\Pack\Compactor\Schema\Column\ValueListColumn;
use Subapp\Pack\Compactor\Schema\SchemaInterface;
use Subapp\Pack\Compactor\Schema\Type\CallbackType;

/**
 * Class SchemaBuilderVersion10001
 * @package Subapp\Pack\Tests\Mock\Builder
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
        
        $schema->addColumn(new BitMaskColumn('bm', BitMaskColumn::INT_16, 110,
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
        
        $schema->addColumn(new FloatColumn('f1', 'float1', 4, 30));
        $schema->addColumn(new FloatColumn('f2', 'float2', 3, 40));
        
        $schema->addColumn(new DoubleColumn('d1', 'double1', 7, 50));
        $schema->addColumn(new DoubleColumn('d2', 'double2', 9, 60));
        
        $schema->addColumn(new IntegerColumn('i1', 'int1', IntegerColumn::INT_32, 300));
        $schema->addColumn(new IntegerColumn('i2', 'int2', IntegerColumn::INT_32, 310));
        $schema->addColumn(new IntegerColumn('i3', 'int3', IntegerColumn::INT_32, 320));
        $schema->addColumn(new IntegerColumn('i4', 'int4', IntegerColumn::INT_32, 330));
        
        $schema->addColumn(new IntegerColumn('l1', 'lot_of_symbols_in_field_name1', IntegerColumn::INT_32, 500));
        $schema->addColumn(new IntegerColumn('l2', 'lot_of_symbols_in_field_name2', IntegerColumn::INT_32, 510));
        $schema->addColumn(new IntegerColumn('l3', 'lot_of_symbols_in_field_name3', IntegerColumn::INT_32, 520));
        $schema->addColumn(new IntegerColumn('l4', 'lot_of_symbols_in_field_name4', IntegerColumn::INT_32, 530));
        $schema->addColumn(new IntegerColumn('l5', 'lot_of_symbols_in_field_name5', IntegerColumn::INT_32, 540));
        $schema->addColumn(new IntegerColumn('l6', 'lot_of_symbols_in_field_name6', IntegerColumn::INT_32, 550));
        
        $schema->addColumn(new ValueListColumn('_', null, PHP_INT_MAX, ';',
            new JsonColumn('a1', 'array1', null, 400),
            new JsonColumn('a2', 'array2', null, 410),
            new StringColumn('un', 'name', null, 200)
        ));
        
        $this->complementSchema($schema);
    }
    
    /**
     * @param SchemaInterface $schema
     */
    protected function complementSchema(SchemaInterface $schema)
    {
        $schema->getColumn('i3')->nullIf(2);
        $schema->getColumn('l3')->nullIf(-1);
        $schema->getColumn('l5')->nullIf(-1);
    }
    
}