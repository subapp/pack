<?php

namespace Subapp\TestApp\Setup;

use Subapp\Pack\Common\Setup\AbstractSetup;
use Subapp\Pack\Compressor\BzCompressor;
use Subapp\Pack\ProcessHandlerCollection;
use Subapp\Pack\Serializer\Base64Serializer;
use Subapp\Pack\Serializer\MsgPackSerializer;

/**
 * Class SetupExtraData_v1
 * @package Subapp\TestApp\Setup
 */
class SetupExtraData_v1 extends AbstractSetup
{

    /**
     * @inheritDoc
     */
    public function setup(ProcessHandlerCollection $handler)
    {
        $handler->addProcess(new MsgPackSerializer());
        $handler->addProcess(new BzCompressor(9));
        $handler->addProcess(new Base64Serializer());
    }

}