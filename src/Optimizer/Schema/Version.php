<?php

namespace Subapp\Pack\Optimizer\Schema;

/**
 * Class Version
 * @package Subapp\Pack\Optimizer\Schema
 */
class Version
{

    /**
     * @var integer
     */
    private $version;

    /**
     * Version constructor.
     * @param $version
     */
    public function __construct($version)
    {
        $this->version = $version;
    }

    /**
     * @return int
     */
    public function getIntegerVersion()
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return sprintf('v%d.%d.%d', ... $this->getVersions());
    }
    
    /**
     * @return string
     */
    public function getClassVersion()
    {
        return sprintf('Version%d%02d%02d', ... $this->getVersions());
    }
    
    /**
     * @return array
     */
    public function getVersions()
    {
        $version = $this->getIntegerVersion();
    
        $patch = $version % 100;
        $version = (integer)($version / 100);
    
        $minor = $version % 100;
        $version = (integer)($version / 100);
        
        return [$version, $minor, $patch,];
    }
    
    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->getVersion();
    }

}