<?php

namespace Subapp\TestApp\Setup;

use Subapp\Pack\Common\Setup\AbstractSetup;
use Subapp\Pack\Compactor\Schema\Version;
use Subapp\Pack\ProcessHandlerCollection;
use Subapp\Pack\Serializer\PhpSerializer;

/**
 * Class VersionSetup
 * @package Subapp\TestApp\Setup
 */
class VersionSetup extends AbstractSetup
{
    
    /**
     * @inheritDoc
     */
    public function setup(ProcessHandlerCollection $handler)
    {
        $schema = $this->loadSchema(new Version(00001), __NAMESPACE__);
        $handler->addProcess(new PhpSerializer());
    }
    
}