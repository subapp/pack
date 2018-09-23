<?php

namespace Subapp\Pack\Runtime\Setup;

use Subapp\Pack\Runtime\Config\ConfigParameters;

/**
 * Class AbstractSetup
 * @package Subapp\Pack\Runtime\Setup
 */
abstract class AbstractSetup implements SetupInterface
{
    
    /**
     * @inheritDoc
     */
    public function getConfiguration()
    {
        return ConfigParameters::createFromFile($this->getConfigurationFile());
    }
    
}