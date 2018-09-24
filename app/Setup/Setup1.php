<?php

namespace Subapp\TestApp\Setup;

use Subapp\Pack\Common\Setup\AbstractSetup;
use Subapp\Pack\Compressor\GzCompressor;
use Subapp\Pack\ProcessHandlerCollection;
use Subapp\Pack\Compactor\Optimizer;
use Subapp\Pack\Serializer\JsonSerializer;
use Subapp\Pack\Serializer\MsgPackSerializer;
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
    public function setup(ProcessHandlerCollection $handler)
    {
        $handler->addProcess(new Optimizer($this->getConfiguration()));
        $handler->addProcess(new GzCompressor());
        $handler->addProcess(new JsonSerializer());
        $handler->addProcess(new PhpSerializer());
        $handler->addProcess(new MsgPackSerializer());
    }
    
    /**
     * @inheritDoc
     */
    public function getConfigurationFile()
    {
        return __DIR__ . '/../pack.yml';
    }

}