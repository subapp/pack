<?php

namespace Subapp\Pack\Runtime\Setup;

use Subapp\Pack\Runtime\ProcessorInterface;

/**
 * Interface SetupInterface
 * @package Subapp\Pack\Runtime\Setup
 */
interface SetupInterface
{
    
    /**
     * @param ProcessorInterface $processor
     */
    public function setup(ProcessorInterface $processor);

}