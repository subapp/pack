<?php

namespace Subapp\Pack\Common\Setup;

use Subapp\Pack\Common\Config\ConfigParametersInterface;
use Subapp\Pack\ProcessHandlerCollection;

/**
 * Interface SetupInterface
 * @package Subapp\Pack\Common\Setup
 */
interface SetupInterface
{
    
    /**
     * @param ProcessHandlerCollection $handler
     */
    public function setup(ProcessHandlerCollection $handler);
    
    /**
     * @return ConfigParametersInterface
     */
    public function getConfiguration();
    
    /**
     * @return string
     */
    public function getConfigurationFile();
    
}