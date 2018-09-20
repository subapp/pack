<?php

namespace Subapp\Pack\App;

use Subapp\Pack\Accessor\ObjectDataAccessor;
use Subapp\Pack\Schema\Column\AbstractColumnLength;
use Subapp\Pack\Schema\Column\BitMaskColumn;
use Subapp\Pack\Schema\Column\BooleanColumn;
use Subapp\Pack\Schema\Column\IntegerColumn;
use Subapp\Pack\Schema\Column\StringColumn;
use Subapp\Pack\Schema\Schema;
use Subapp\Pack\Schema\Version;

include_once __DIR__ . '/../vendor/autoload.php';

$version = new Version(137812);
$schema = new Schema($version);

$schema->addColumn(new IntegerColumn('created', 'created_at', 1001, IntegerColumn::INT16));
$schema->addColumn(new BitMaskColumn('mask', 2, new BooleanColumn('is_hotel', 'is_hotel', 1), new BooleanColumn('is_user', 'is_user', 0), new BooleanColumn('readable', 'is_readable', 1000)));
$schema->addColumn(new StringColumn('description', 'hotelDescription', 1, 255));
$schema->addColumn(new StringColumn('name', 'entity_name', 1000, 32));

echo $schema->getVersion() . PHP_EOL;

// include test entity class
include_once __DIR__ . '/DataEntityTest.php';
$entity = new DataEntityTest();

$dataAccessor = new ObjectDataAccessor($entity);
$collection = [];

/** @var AbstractColumnLength $value $booleanValue */
foreach ($schema->getColumns() as $value) {
    echo $value->getName() . ' ' . $value->getColumnName() . PHP_EOL;

    if ($value instanceof BitMaskColumn) {
        /** @var AbstractColumnLength $booleanValue $booleanValue */
        foreach ($value->getColumns() as $booleanValue) {
            echo '>>> ' . get_class($booleanValue) .': '. $booleanValue->getName() . ' ' . $booleanValue->getColumnName() . PHP_EOL;
        }
    } else {
        $collection[$value->getName()] = $dataAccessor->getValue($value->getColumnName());
    }
}

die(var_dump($collection));