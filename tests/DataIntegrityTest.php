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
        $handlerA = $this->getHandlerA();
        
        $serialized     = $handlerA->serialize($this->entityObjectB);
        $unserialized   = $handlerA->unserialize($serialized);
        var_dump($serialized); die();
        $entityB = clone $this->entityObjectB;
    
        $entityB->created = $entityB->created->format(DATE_ATOM);
        $entityB->updated = $entityB->updated->format(DATE_ATOM);
        
        foreach ($unserialized as $propertyName => $actualValue) {
            $expectedValue = $this->entityObjectB->{$propertyName};
            
            list($actualValue, $expectedValue) = $this->normalizeValues($actualValue, $expectedValue);

            $this->assertEquals($expectedValue, $actualValue);
            $this->assertEquals(gettype($expectedValue), gettype($actualValue));
        }
    }
    
    /**
     * @param $actualValue
     * @param $expectedValue
     * @return array
     */
    private function normalizeValues($actualValue, $expectedValue)
    {
        if ($actualValue instanceof \DateTime && $expectedValue instanceof \DateTime) {
            $actualValue = $actualValue->format(DATE_ATOM);
            $expectedValue = $expectedValue->format(DATE_ATOM);
        }
        
        return [$actualValue, $expectedValue,];
    }

}