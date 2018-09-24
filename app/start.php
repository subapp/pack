<?php

namespace Subapp\TestApp;

use Subapp\Pack\ProcessHandlerCollection;
use Subapp\TestApp\Entity\BigCacheDataFilled;
use Subapp\TestApp\Setup\Setup1;

include_once __DIR__ . '/../vendor/autoload.php';

$entity = new BigCacheDataFilled();

$handler = new ProcessHandlerCollection();

$handler->setup(new Setup1());

$serialized = $handler->serialize($entity);

//$entity->stringData = $facade->serialize($entity->stringData);

var_dump($serialized);