<?php

namespace Subapp\TestApp;

use Subapp\Pack\Optimizer\Facade;
use Subapp\Pack\Optimizer\Schema\Version;
use Subapp\Pack\Runtime\Config\ConfigParameters;
use Subapp\TestApp\Entity\BigCacheData;
use Subapp\TestApp\Entity\BigCacheDataFilled;

include_once __DIR__ . '/../vendor/autoload.php';

$version = new Version(10001);
$facade = new Facade(ConfigParameters::createFromFile(__DIR__ . '/pack.yml'));

$facade->initialize($version);

$entity = new BigCacheDataFilled();
$empty = new BigCacheData();

$packed = $facade->pack($entity);
$entity = $facade->unpack($packed, $empty);

var_dump($packed, $empty); die;