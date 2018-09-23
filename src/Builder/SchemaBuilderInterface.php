<?php

namespace Subapp\Pack\Builder;

use Subapp\Pack\Schema\SchemaInterface;

/**
 * Interface SchemaBuilderInterface
 * @package Subapp\Pack\Builder
 */
interface SchemaBuilderInterface
{
    
    /**
     * @return void
     */
    public function buildSchema();
    
    /**
     * @return SchemaInterface
     */
    public function getSchema();
    
}