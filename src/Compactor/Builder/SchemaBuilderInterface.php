<?php

namespace Subapp\Pack\Compactor\Builder;

use Subapp\Pack\Compactor\Schema\SchemaInterface;

/**
 * Interface SchemaBuilderInterface
 * @package Subapp\Pack\Compactor\Builder
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