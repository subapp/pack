<?php

namespace Subapp\Pack\Tests\Mock\Setup;

use Subapp\Pack\Compactor\PackCompactor;
use Subapp\Pack\Compactor\ReduceCompactor;
use Subapp\Pack\ProcessHandlerCollection;
use Subapp\Pack\Tests\Mock\Entity\EntityCacheData;

/**
 * Class SetupOptimal
 * @package Subapp\Pack\Tests\Mock\Setup
 */
class SetupOptimal extends AbstractSetupVersion10001
{
    
    /**
     * @inheritDoc
     */
    public function setup(ProcessHandlerCollection $handler)
    {
        $schema = $this->getSchema();
        
        $handler->addProcess(new ReduceCompactor($schema, EntityCacheData::class));
        $handler->addProcess(new PackCompactor($schema));
    }
    
}