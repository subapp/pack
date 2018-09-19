<?php

namespace Subapp\Pack\App;

use Subapp\Pack\Schema\Value\AbstractValueLength;
use Subapp\Pack\Schema\Value\IntegerValue;
use Subapp\Pack\Schema\Value\StringValue;
use Subapp\Pack\Schema\Schema;
use Subapp\Pack\Schema\Version;

include_once __DIR__ . '/../vendor/autoload.php';

$version = new Version(137812);
$schema = new Schema($version);

$schema->addValue(new IntegerValue('created', 'created_at', IntegerValue::INT16));
$schema->addValue(new StringValue('description', 'hotel_description', 255));
$schema->addValue(new StringValue('name', 'hotel_name', 32));

echo $schema->getVersion() . PHP_EOL;

/** @var AbstractValueLength $value */
foreach ($schema->getValues() as $value) {
    echo $value->getName() . ' ' . $value->getColumnName() . PHP_EOL;
}