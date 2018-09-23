<?php

namespace Subapp\TestApp\Setup;

use Subapp\Pack\Runtime\ProcessorInterface;
use Subapp\Pack\Runtime\Setup\AbstractSetup;

/**
 * Class Setup1
 * @package Subapp\TestApp\Setup
 */
class Setup1 extends AbstractSetup
{
    
    /**
     * @inheritDoc
     */
    public function setup(ProcessorInterface $processor)
    {
        $this->getConfiguration();
    }
    
    /**
     * @inheritDoc
     */
    public function getConfigurationFile()
    {
        return __DIR__ . '/../pack1.yml';
    }

}