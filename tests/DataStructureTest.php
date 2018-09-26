<?php

namespace Subapp\Pack\Tests;

use PHPUnit\Framework\TestCase;
use Subapp\Pack\Common\Setup\SetupInterface;
use Subapp\Pack\Compactor\Schema\Column\BitMaskColumn;
use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;
use Subapp\Pack\Compactor\Schema\Column\DoubleColumn;
use Subapp\Pack\Compactor\Schema\Column\FloatColumn;
use Subapp\Pack\Compactor\Schema\Column\IntegerColumn;
use Subapp\Pack\Compactor\Schema\Column\JsonColumn;
use Subapp\Pack\Compactor\Schema\Column\StringColumn;
use Subapp\Pack\Compactor\Schema\Column\TimestampColumn;
use Subapp\Pack\Compactor\Schema\Column\ValueListColumn;
use Subapp\Pack\Compactor\Schema\SchemaInterface;
use Subapp\Pack\Compactor\Schema\Version;
use Subapp\Pack\Tests\Mock\Setup\SetupWithMinProcessors;

/**
 * Class SchemaTest
 * @package Subapp\Pack\Tests
 */
class DataStructureTest extends AbstractBoot
{

//    public function testBoot()
//    {
//        /** @var SetupVersion10001 $setup */
//        $setup = $this->getSetup();
//        $handler = $this->getHandler();
//        $schema = $this->getSchema();
//
//        $this->assertInstanceOf(SetupInterface::class, $setup);
//        $this->assertCount(15, $schema->getColumns());
//        $this->assertCount(3, $handler->getHandlers());
//    }

    public function testVersionObject()
    {
        $version = $this->getSchema()->getVersion();

        $this->assertInstanceOf(Version::class, $version);
        $this->assertEquals(10001, $version->getIntegerVersion());
        $this->assertEquals('v1.0.1', $version->getVersion());
        $this->assertEquals('Version10001', $version->getClassVersion());
        $this->assertEquals([1, 0, 1], $version->getVersions());
    }

    /**
     * @dataProvider getSchemaColumnsData
     *
     * @param array $columnData
     * @param ColumnInterface $column
     */
    public function testSchemaVersion10001(array $columnData, ColumnInterface $column)
    {
        list($class, $name, $columnName) = $columnData;
        $this->assertInstanceOf($class, $column);
        $this->assertEquals($name, $column->getName());
        $this->assertEquals($columnName, $column->getColumnName());
    }

    /**
     * @return array
     */
    public function getSchemaColumnsData()
    {
        $columns = $this->getSchema()->getColumns();

        $sequence = [
            [TimestampColumn::class, 'created', 'created',],
            [TimestampColumn::class, 'updated', 'updated',],
            [FloatColumn::class, 'f1', 'float1',],
            [FloatColumn::class, 'f2', 'float2',],
            [DoubleColumn::class, 'd1', 'double1',],
            [DoubleColumn::class, 'd2', 'double2',],
            [IntegerColumn::class, 'id', 'userId',],
            [BitMaskColumn::class, 'bm', null,],
//            [StringColumn::class, 'un', 'name',],
            [IntegerColumn::class, 'i1', 'int1',],
            [IntegerColumn::class, 'i2', 'int2',],
            [IntegerColumn::class, 'i3', 'int3',],
            [IntegerColumn::class, 'i4', 'int4',],
//            [JsonColumn::class, 'a1', 'array1',],
//            [JsonColumn::class, 'a2', 'array2',],
            [IntegerColumn::class, 'l1', 'lot_of_symbols_in_field_name1',],
            [IntegerColumn::class, 'l2', 'lot_of_symbols_in_field_name2',],
            [IntegerColumn::class, 'l3', 'lot_of_symbols_in_field_name3',],
            [IntegerColumn::class, 'l4', 'lot_of_symbols_in_field_name4',],
            [IntegerColumn::class, 'l5', 'lot_of_symbols_in_field_name5',],
            [IntegerColumn::class, 'l6', 'lot_of_symbols_in_field_name6',],
            [ValueListColumn::class, '_', null,],
        ];

        $data = [];

        foreach ($sequence as $index => $columnData) {
            $data[] = [$columnData, $columns->offsetGet($index),];
        }

        return $data;
    }

}