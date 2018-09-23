<?php

namespace Subapp\Pack\Common\Setup;

use Subapp\Pack\Common\Config\ConfigParametersInterface;
use Subapp\Pack\Facade;

/**
 * Interface SetupInterface
 * @package Subapp\Pack\Common\Setup
 */
interface SetupInterface
{
    
    /**
     * @param Facade $facade
     */
    public function setup(Facade $facade);
    
    /**
     * @return ConfigParametersInterface
     */
    public function getConfiguration();
    
    /**
     * @return string
     */
    public function getConfigurationFile();
    
}