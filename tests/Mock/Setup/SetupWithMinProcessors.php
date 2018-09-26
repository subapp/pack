<?php

namespace Subapp\Pack\Tests\Mock\Setup;

use Subapp\Pack\Compactor\ReduceCompactor;
use Subapp\Pack\ProcessHandlerCollection;
use Subapp\Pack\Serializer\JsonSerializer;
use Subapp\Pack\Tests\Mock\Entity\EntityCacheData;

/**
 * Class SetupVersion10001
 * @package Subapp\Pack\Tests\Mock
 */
class SetupWithMinProcessors extends AbstractSetupVersion10001
{

    /**
     * @inheritDoc
     */
    public function setup(ProcessHandlerCollection $handler)
    {
        $schema = $this->getSchema();
        $handler->addProcess(new ReduceCompactor($schema, EntityCacheData::class));
        $handler->addProcess(new JsonSerializer());
    }

}