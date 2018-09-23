<?php

namespace Subapp\Pack\App;

use Subapp\Pack\Compressor\BzCompressor;
use Subapp\Pack\Compressor\GzCompressor;
use Subapp\Pack\Optimizer\Collection\Values;
use Subapp\Pack\Optimizer\Factory\AccessorFactory;
use Subapp\Pack\Optimizer\Hydrator\Hydrator;
use Subapp\Pack\Optimizer\Packer\Builder\PackFormatBuilder;
use Subapp\Pack\Optimizer\Packer\Mapping\TypeMapping;
use Subapp\Pack\Optimizer\Packer\Packer;
use Subapp\Pack\Optimizer\Packer\PhpPack\PhpPack;
use Subapp\Pack\Optimizer\Schema\Column\BitMaskColumn;
use Subapp\Pack\Optimizer\Schema\Column\BooleanColumn;
use Subapp\Pack\Optimizer\Schema\Column\CombinedColumn;
use Subapp\Pack\Optimizer\Schema\Column\DatetimeColumn;
use Subapp\Pack\Optimizer\Schema\Column\IntegerColumn;
use Subapp\Pack\Optimizer\Schema\Column\StringColumn;
use Subapp\Pack\Optimizer\Schema\Column\TimestampColumn;
use Subapp\Pack\Optimizer\Schema\Schema;
use Subapp\Pack\Optimizer\Schema\Version;

include_once __DIR__ . '/../vendor/autoload.php';

$version = new Version(10001);
$schema = new Schema($version);

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

//$schema->addColumn(new StringColumn('description', 'hotelDescription', 1, 255));
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
$inputEntity = $factory->getAccessor($entity);
$output = $factory->getAccessor([]);

$hydrator = new Hydrator($schema);
$hydrator->extract($inputEntity, $output);

$collapsedArray = $output->getSource();

var_dump($collapsedArray);

echo PHP_EOL . '--------- [Hydration] ---------' . PHP_EOL;

$iterator = new \ArrayIterator([]);

$input = $factory->getAccessor($collapsedArray);
$output = $factory->getAccessor([]);

$hydrator->hydrate($input, $output);

var_dump($output->getSource());

echo PHP_EOL . '--------- [Pack] ---------' . PHP_EOL;

$builder = new PackFormatBuilder($schema, new TypeMapping());
$packer = new Packer(new PhpPack(), $builder);

$values = new Values($collapsedArray);

var_dump(json_encode($values));

//var_dump($builder->getPackFormat(), $builder->getUnpackFormat());

$packed = $packer->pack($values);

$inputValues = new Values();
$packer->unpack($packed, $inputValues);

var_dump($packed);
var_dump($inputValues->toArray());

$output4 = $factory->getAccessor([]);
$hydrator->hydrate($factory->getAccessor($inputValues->toArray()), $output4);

var_dump($output4);

$compressor = new GzCompressor();

$json = json_encode($output4->getSource());

var_dump($json, $compressor->compress($packed));