<?php

namespace Subapp\Pack\Runtime\Config;

use Subapp\Collection\Parameters\ParametersCollection;

/**
 * Class ConfigParameters
 * @package Subapp\Pack\Runtime\Config
 */
class ConfigParameters extends ParametersCollection implements ConfigParametersInterface
{
    
    /**
     * @inheritDoc
     */
    public function getDefaultNamespace()
    {
        return $this->path('subapp.optimizer.builder.defaultNamespace');
    }
    
}