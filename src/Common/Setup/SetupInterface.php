<?php

namespace Subapp\Pack\Common\Setup;

use Subapp\Pack\Common\Config\ConfigParametersInterface;
use Subapp\Pack\Common\ProcessorInterface;

/**
 * Interface SetupInterface
 * @package Subapp\Pack\Common\Setup
 */
interface SetupInterface
{
    
    /**
     * @param ProcessorInterface $processor
     */
    public function setup(ProcessorInterface $processor);
    
    /**
     * @return ConfigParametersInterface
     */
    public function getConfiguration();
    
    /**
     * @return string
     */
    public function getConfigurationFile();
    
}