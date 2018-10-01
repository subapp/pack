<?php

namespace Subapp\Pack\Compactor\Schema;

/**
 * Interface SchemaKeeperInterface
 * @package Subapp\Pack\Compactor\Schema
 */
interface SchemaKeeperInterface
{
    
    /**
     * @return SchemaInterface
     */
    public function getSchema();
    
}