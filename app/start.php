<?php

namespace Subapp\Pack\App;

use Subapp\Pack\Accessor\ObjectAccessor;
use Subapp\Pack\Factory\AccessorFactory;
use Subapp\Pack\Factory\SchemaBuilderFactory;
use Subapp\Pack\Hydrator\Hydrator;
use Subapp\Pack\Schema\Column\AbstractColumnLength;
use Subapp\Pack\Schema\Column\BitMaskColumn;
use Subapp\Pack\Schema\Column\BooleanColumn;
use Subapp\Pack\Schema\Column\CombinedColumn;
use Subapp\Pack\Schema\Column\DatetimeColumn;
use Subapp\Pack\Schema\Column\IntegerColumn;
use Subapp\Pack\Schema\Column\StringColumn;
use Subapp\Pack\Schema\Column\TimestampColumn;
use Subapp\Pack\Schema\Schema;
use Subapp\Pack\Schema\Version;

include_once __DIR__ . '/../vendor/autoload.php';

$version = new Version(10001);
$schema = new Schema($version);

$schema->addColumn(new IntegerColumn('id', 'user_id', 500, 16));
$schema->addColumn(new DatetimeColumn('created', 'created_at', 1001, 32));
$schema->addColumn(new TimestampColumn('updated', 'updated_at', 1001, IntegerColumn::INT16));

$schema->addColumn(new BitMaskColumn('mask', 120,
    new BooleanColumn('is_hotel', 'is_hotel', 1),
    new BooleanColumn('is_user', 'is_user', 0),
    new BooleanColumn('readable', 'is_readable', 1000)
));

$schema->addColumn(new CombinedColumn('testConcat', 30, ';',
    new StringColumn('name', 'entity_name', 1000, 32),
    new DatetimeColumn('created', 'created_at', 1011, 32),
    new TimestampColumn('updated', 'updated_at', 1001, IntegerColumn::INT16),
    new BooleanColumn('readable', 'is_readable', 1000)
));

$schema->addColumn(new StringColumn('description', 'hotelDescription', 1, 255));
//$schema->addColumn(new StringColumn('name', 'entity_name', 1000, 32));

echo PHP_EOL . '--------- [Version] ---------' . PHP_EOL;

echo $schema->getVersion() . PHP_EOL;

echo PHP_EOL . '--------- [Extraction] ---------' . PHP_EOL;

// include test entity class
include_once __DIR__ . '/DataEntityTest.php';
$entity = new DataEntityTest();

// $builderFactory = new SchemaBuilderFactory();
// $builder = $builderFactory->getSchemaBuilder($version, '\\Builder');

$factory = new AccessorFactory();
$input = $factory->getAccessor($entity);
$output = $factory->getAccessor([]);

$hydrator = new Hydrator($schema);
$hydrator->extract($input, $output);

$collapsedArray = $output->getSource();

var_dump($collapsedArray);

echo PHP_EOL . '--------- [Hydration] ---------' . PHP_EOL;

$iterator = new \ArrayIterator([]);

$input = $factory->getAccessor($collapsedArray);
$output = $factory->getAccessor([]);

$hydrator->hydrate($input, $output);

var_dump($output->getSource());
