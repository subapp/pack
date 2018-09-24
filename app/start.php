<?php

namespace Subapp\TestApp;

use Subapp\Pack\ProcessHandlerCollection;
use Subapp\TestApp\Entity\BigCacheDataFilled;
use Subapp\TestApp\Setup\SetupExtraData_v1;
use Subapp\TestApp\Setup\SetupVersion10001;

include_once __DIR__ . '/../vendor/autoload.php';

$unserialized = null;
$entity = new BigCacheDataFilled();

$handler = new ProcessHandlerCollection();
$handlerExtra = new ProcessHandlerCollection();

$handler->setup(new SetupVersion10001());
$handlerExtra->setup(new SetupExtraData_v1());

$serialized = $handler->serialize($entity);
$unserialized = $handler->unserialize($serialized);

var_dump($serialized, $unserialized);