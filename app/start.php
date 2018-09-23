<?php

namespace Subapp\TestApp;

use Subapp\Pack\Facade;
use Subapp\TestApp\Entity\BigCacheDataFilled;
use Subapp\TestApp\Setup\Setup1;

include_once __DIR__ . '/../vendor/autoload.php';

$entity = new BigCacheDataFilled();

$facade = new Facade();

$facade->setup(new Setup1());

$serialized = $facade->serialize($entity);

var_dump($serialized);