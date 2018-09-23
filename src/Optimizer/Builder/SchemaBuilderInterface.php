<?php

namespace Subapp\Pack\Optimizer\Builder;

use Subapp\Pack\Optimizer\Schema\SchemaInterface;

/**
 * Interface SchemaBuilderInterface
 * @package Subapp\Pack\Optimizer\Builder
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