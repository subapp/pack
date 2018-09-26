<?php

namespace Subapp\TestApp\Setup;

use Subapp\Pack\Common\Setup\AbstractSetup;
use Subapp\Pack\Compactor\PackCompactor;
use Subapp\Pack\Compactor\ReduceCompactor;
use Subapp\Pack\Compactor\Schema\Version;
use Subapp\Pack\Compressor\BzCompressor;
use Subapp\Pack\ProcessHandlerCollection;

/**
 * Class Setup1
 * @package Subapp\TestApp\Setup
 */
class SetupVersion10002 extends AbstractSetup
{

    /**
     * @inheritDoc
     */
    public function setup(ProcessHandlerCollection $handler)
    {
        $schema = $this->loadSchema(new Version(10002), 'Subapp\\TestApp\\Builder');
        $handler->addProcess(new ReduceCompactor($schema));
        $handler->addProcess(new PackCompactor($schema));
//        $handler->addProcess(new BzCompressor(1));
    }

}