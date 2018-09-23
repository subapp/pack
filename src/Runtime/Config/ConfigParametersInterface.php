<?php

namespace Subapp\Pack\Runtime\Config;

use Subapp\Collection\Parameters\ParametersInterface;

/**
 * Interface ConfigParametersInterface
 * @package Subapp\Pack\Runtime\Config
 */
interface ConfigParametersInterface extends ParametersInterface
{
    
    /**
     * @return mixed
     */
    public function getDefaultNamespace();
    
}