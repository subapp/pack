<?php

namespace Subapp\Pack\Tests\Mock\Setup;

use Subapp\Pack\Common\Setup\AbstractSetup;
use Subapp\Pack\Tests\Mock\Version10001;

/**
 * Class AbstractSetupVersion10001
 * @package Subapp\Pack\Tests\Mock\Setup
 */
abstract class AbstractSetupVersion10001 extends AbstractSetup
{
    
    /**
     * @return \Subapp\Pack\Compactor\Schema\SchemaInterface
     */
    public function getSchema()
    {
        return $this->loadSchema($this->getVersion10001(), 'Subapp\Pack\Tests\Mock\Builder');
    }
    
    /**
     * @return Version10001
     */
    public function getVersion10001()
    {
        return new Version10001();
    }
    
}