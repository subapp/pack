<?php

namespace Subapp\Pack\Tests\Mock\Setup;

use Subapp\Pack\Common\Setup\AbstractSetup;
use Subapp\Pack\Compactor\PackCompactor;
use Subapp\Pack\Compactor\ReduceCompactor;
use Subapp\Pack\ProcessHandlerCollection;
use Subapp\Pack\Serializer\Base64Serializer;
use Subapp\Pack\Tests\Mock\Entity\EntityCacheData;
use Subapp\Pack\Tests\Mock\Version10001;

/**
 * Class SetupVersion10001
 * @package Subapp\Pack\Tests\Mock
 */
class SetupVersion10001 extends AbstractSetup
{

    /**
     * @inheritDoc
     */
    public function setup(ProcessHandlerCollection $handler)
    {
        $schema = $this->getSchema();
        $handler->addProcess(new ReduceCompactor($schema, EntityCacheData::class));
//        $handler->addProcess(new PackCompactor($schema));
//        $handler->addProcess(new Base64Serializer());
    }

    /**
     * @return \Subapp\Pack\Compactor\Schema\SchemaInterface
     */
    public function getSchema()
    {
        return $this->loadSchema($this->getVersion10001(), 'Subapp\Pack\Tests\Mock\Builder');
    }

    /**
     * @return Version10001
     */
    public function getVersion10001()
    {
        return new Version10001();
    }

}