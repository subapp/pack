<?php

namespace Subapp\TestApp\Setup;

use Subapp\Pack\Common\Setup\AbstractSetup;
use Subapp\Pack\Compressor\GzCompressor;
use Subapp\Pack\Facade;
use Subapp\Pack\Optimizer\Optimizer;
use Subapp\Pack\Serializer\PhpSerializer;

/**
 * Class Setup1
 * @package Subapp\TestApp\Setup
 */
class Setup1 extends AbstractSetup
{
    
    /**
     * @inheritDoc
     */
    public function setup(Facade $facade)
    {
        $facade->setOptimizer(new Optimizer($this->getConfiguration()));
        $facade->setCompressor(new GzCompressor());
        $facade->addSerializer(new PhpSerializer());
    }
    
    /**
     * @inheritDoc
     */
    public function getConfigurationFile()
    {
        return __DIR__ . '/../pack.yml';
    }

}