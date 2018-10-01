<?php

namespace Subapp\Pack\App;

use Subapp\Pack\Compactor\Collection\Values;
use Subapp\Pack\Compactor\Optimizer;
use Subapp\Pack\Compactor\Schema\Version;
use Subapp\Pack\App\Entity\BigCacheData;
use Subapp\Pack\App\Entity\BigCacheDataFilled;

include_once __DIR__ . '/../vendor/autoload.php';

$version = new Version(10001);
$optimizer = new Optimizer(ConfigParameters::createFromFile(__DIR__ . '/pack.yml'));

$entity = new BigCacheDataFilled();
$empty = new BigCacheData();

$packed = $optimizer->pack($entity);
var_dump($empty, $packed);
$optimizer->unpack($packed, $empty);
var_dump($empty);
$values = $optimizer->extract($entity, new Values());

$empty->created = $empty->created->format(DATE_ATOM);
$empty->updated = $empty->updated->format(DATE_ATOM);

$json = json_encode($empty);
$jsonShort = $values->toJSON();

$packedLength = mb_strlen($packed);
$jsonLength = mb_strlen($json);
$jsonShortLength = mb_strlen($jsonShort);

echo sprintf("Packed: %s bytes\n", $packedLength);
echo sprintf("JSON: %s bytes\n", $jsonLength);
echo sprintf("JSON (Short): %s bytes\n\n", $jsonShortLength);

echo "--------[ Optimization ]--------\n";

echo sprintf("JSON with JSON (Short): %s %% \n", round(($jsonLength / $jsonShortLength) * 100, 2));
echo sprintf("Packed Data with JSON (Short): %s %% \n", round(($jsonShortLength / $packedLength) * 100, 2));
echo sprintf("Packed Data with JSON: %s %% \n", round(($jsonLength / $packedLength) * 100, 2));

echo "-----\n\n";

var_dump($packed, $json, $jsonShort);

var_dump($empty);