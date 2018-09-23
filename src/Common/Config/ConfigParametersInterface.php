<?php

namespace Subapp\Pack\Common\Config;

use Subapp\Collection\Parameters\ParametersInterface;

/**
 * Interface ConfigParametersInterface
 * @package Subapp\Pack\Common\Config
 */
interface ConfigParametersInterface extends ParametersInterface
{
    
    /**
     * @return mixed
     */
    public function getDefaultNamespace();
    
}