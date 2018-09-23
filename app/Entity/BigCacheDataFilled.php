<?php

namespace Subapp\TestApp\Entity;

/**
 * Class BigCacheDataFilled
 * @package Subapp\TestApp\Entity
 */
class BigCacheDataFilled extends BigCacheData
{
    
    /**
     * BigCacheDataFilled constructor.
     */
    public function __construct()
    {
        $this->userId = random_int(100000, 999999);
        $this->name = 'John Doe';
        $this->created = new \DateTime('now - 255 days');
        $this->updated = new \DateTime('now - 127 days');
        $this->float1 = 0.0001;
        $this->float2 = 1234.123;
        $this->double1 = 0.0000001;
        $this->double1 = 1234.123456789;
    }
    
}