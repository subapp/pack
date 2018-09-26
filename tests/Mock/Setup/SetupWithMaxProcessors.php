<?php

namespace Subapp\Pack\Tests\Mock\Setup;

use Subapp\Pack\Compactor\PackCompactor;
use Subapp\Pack\Compactor\ReduceCompactor;
use Subapp\Pack\Compressor\BzCompressor;
use Subapp\Pack\ProcessHandlerCollection;
use Subapp\Pack\Serializer\Base64Serializer;
use Subapp\Pack\Tests\Mock\Entity\EntityCacheData;

/**
 * Class SetupWithMaxProcessors
 * @package Subapp\Pack\Tests\Mock\Setup
 */
class SetupWithMaxProcessors extends AbstractSetupVersion10001
{
    
    /**
     * @inheritDoc
     */
    public function setup(ProcessHandlerCollection $handler)
    {
        $schema = $this->getSchema();
        $handler->addProcess(new ReduceCompactor($schema, EntityCacheData::class));
        $handler->addProcess(new PackCompactor($schema));
        $handler->addProcess(new BzCompressor(9));
    }
    
}