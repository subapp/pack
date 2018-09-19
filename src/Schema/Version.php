<?php

namespace Subapp\Pack\Schema;

/**
 * Class Version
 * @package Subapp\Pack\Schema
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
        $version = $this->getIntegerVersion();

        $patch = $version % 100;
        $version = (integer)$version / 100;

        $minor = $version % 100;
        $version = (integer)$version / 100;

        return sprintf('v%d.%d.%d', $version, $minor, $patch);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->getVersion();
    }

}