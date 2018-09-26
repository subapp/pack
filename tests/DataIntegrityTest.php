<?php

namespace Subapp\Pack\Tests;

use Subapp\Pack\Tests\Mock\Entity\EntityCacheData;
use Subapp\Pack\Tests\Mock\Entity\EntityCacheData_Filled;

/**
 * Class DataIntegrityTest
 * @package Subapp\Pack\Tests
 */
class DataIntegrityTest extends AbstractBoot
{

    /**
     * @var EntityCacheData
     */
    protected $entityObjectA;

    /**
     * @var EntityCacheData_Filled
     */
    protected $entityObjectB;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        $this->entityObjectA = new EntityCacheData();
        $this->entityObjectB = new EntityCacheData_Filled();
    }

    /**
     * @return void
     */
    public function testSerializedData()
    {
        $serialized = $this->handler->serialize($this->entityObjectB);
        $unserialized = $this->handler->unserialize($serialized);
        die(var_dump($unserialized));
    }

}