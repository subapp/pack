<?php

namespace Subapp\Pack\Decorator;

use Subapp\Pack\Compactor\CompactorInterface;
use Subapp\Pack\Compressor\CompressorInterface;
use Subapp\Pack\Serializer\SerializerInterface;

/**
 * Class ProcessHandlerFactory
 * @package Subapp\Pack\Decorator
 */
class ProcessHandlerFactory
{

    /**
     * @param $process
     * @return ProcessHandlerInterface
     */
    public function getProcessHandler($process)
    {
        $handler = null;

        switch (true) {
            case ($process instanceof SerializerInterface):
                $handler = new SerializerProcessHandler($process);
                break;
            case ($process instanceof CompressorInterface):
                $handler = new CompressorProcessHandler($process);
                break;
            case ($process instanceof CompactorInterface):
                $handler = new CompactorProcessHandler($process);
                break;
            default:
                throw new \InvalidArgumentException(sprintf('Unsupported process type (%s) for process-handler',
                    is_object($process) ? get_class($process) : gettype($process)));
        }

        return $handler;
    }

}