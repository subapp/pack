<?php

namespace Subapp\Pack\Decorator;

use Subapp\Pack\Compressor\CompressorInterface;

/**
 * Class CompressorProcessHandler
 * @package Subapp\Pack\Decorator
 */
class CompressorProcessHandler implements ProcessHandlerInterface
{

    /**
     * @var CompressorInterface
     */
    private $compressor;

    /**
     * CompressorProcessHandler constructor.
     * @param CompressorInterface $compressor
     */
    public function __construct(CompressorInterface $compressor)
    {
        $this->compressor = $compressor;
    }

    /**
     * @inheritdoc
     */
    public function serialize($values)
    {
        return $this->compressor->compress($values);
    }

    /**
     * @inheritdoc
     */
    public function unserialize($values)
    {
        return $this->compressor->decompress($values);
    }

}