<?php

namespace Subapp\Pack\Tests\Mock\Entity;

/**
 * Class EntityCacheData_Filled
 * @package Subapp\Pack\Tests\Mock\Entity
 */
class EntityCacheData_Filled extends EntityCacheData
{
    
    /**
     * BigCacheDataFilled constructor.
     */
    public function __construct()
    {
        $this->userId = 999999;
        $this->name = 'John Doe';
        $this->created = new \DateTime('now - 255 days');
        $this->updated = new \DateTime('now - 127 days');
        $this->float1 = 0.0001;
        $this->float2 = 1234.123;
        $this->double1 = 0.0000001;
        $this->double2 = 1234.123456789;
    }
    
}