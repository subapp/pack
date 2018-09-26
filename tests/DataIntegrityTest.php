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
        
        $entityB = clone $this->entityObjectB;
    
        $entityB->created = $entityB->created->format(DATE_ATOM);
        $entityB->updated = $entityB->updated->format(DATE_ATOM);
        
        $originalJson   = json_encode($entityB);
        $compressedJson = gzcompress($originalJson, 9);
        $base64Json     = base64_encode($compressedJson);
        
        echo PHP_EOL;
        
        echo sprintf('Json Encode: %d bytes', strlen($originalJson)) . PHP_EOL;
        echo sprintf('Json Encode + Gz9: %d bytes', strlen($compressedJson)) . PHP_EOL;
        echo sprintf('Json Encode + Gz9 + Base64: %d bytes', strlen($base64Json)) . PHP_EOL;
        
        echo sprintf('Reduce + Json Encode: %d bytes', strlen($serialized)) . PHP_EOL;
        echo sprintf('Reduce + PHP Pack: %d bytes', strlen($this->getHandlerB()->serialize($this->entityObjectB))) . PHP_EOL;
        echo sprintf('Reduce + PHP Pack + Bz9: %d bytes', strlen($this->getHandlerC()->serialize($this->entityObjectB))) . PHP_EOL;

        echo PHP_EOL;
        
        echo $originalJson . PHP_EOL;
        echo $serialized . PHP_EOL;
        echo $this->getHandlerB()->serialize($this->entityObjectB) . PHP_EOL;
        
        echo json_encode($unserialized).PHP_EOL;
        
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