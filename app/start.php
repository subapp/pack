<?php

namespace Subapp\Pack\App;

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

$schema->addValue(new IntegerColumn('created', 'created_at', IntegerColumn::INT16));
$schema->addValue(new BitMaskColumn('mask', new BooleanColumn('is_hotel', 'is_real_hotel'), new BooleanColumn('is_user', 'is_user')));
$schema->addValue(new StringColumn('description', 'hotel_description', 255));
$schema->addValue(new StringColumn('name', 'hotel_name', 32));

echo $schema->getVersion() . PHP_EOL;

/** @var AbstractColumnLength $value $booleanValue */
foreach ($schema->getValues() as $value) {
    echo $value->getName() . ' ' . $value->getColumnName() . PHP_EOL;

    if ($value instanceof BitMaskColumn) {
        /** @var AbstractColumnLength $value $booleanValue */
        foreach ($value->getValues() as $booleanValue) {
            echo '>>> ' . get_class($booleanValue) .': '. $booleanValue->getName() . ' ' . $booleanValue->getColumnName() . PHP_EOL;
        }
    }
}