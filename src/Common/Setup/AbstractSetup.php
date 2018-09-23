<?php

namespace Subapp\Pack\Common\Setup;

use Subapp\Pack\Common\Config\ConfigParameters;

/**
 * Class AbstractSetup
 * @package Subapp\Pack\Common\Setup
 */
abstract class AbstractSetup implements SetupInterface
{
    
    /**
     * @return ConfigParameters
     */
    public function getConfiguration()
    {
        return ConfigParameters::createFromFile($this->getConfigurationFile());
    }
    
}