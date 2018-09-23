<?php

namespace Subapp\Pack\Common\Config;

use Subapp\Collection\Parameters\ParametersCollection;

/**
 * Class ConfigParameters
 * @package Subapp\Pack\Common\Config
 */
class ConfigParameters extends ParametersCollection implements ConfigParametersInterface
{
    
    /**
     * @inheritdoc
     */
    public function getVersion()
    {
        return $this->path('subapp.schema.version');
    }
    
    /**
     * @inheritDoc
     */
    public function getNamespace()
    {
        return $this->path('subapp.schema.builder.namespace');
    }
    
}