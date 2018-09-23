<?php

namespace Subapp\TestApp;

use Subapp\Pack\Optimizer\OptimizerFacade;
use Subapp\Pack\Optimizer\Schema\Version;
use Subapp\Pack\Runtime\Config\ConfigParameters;

include_once __DIR__ . '/../vendor/autoload.php';

$version = new Version(10001);
$optimizer = new OptimizerFacade(ConfigParameters::createFromFile(__DIR__ . '/optimizer.yml'));

$schema = $optimizer->loadSchema($version);

$optimizer->hydrateTo();

var_dump($schema); die;