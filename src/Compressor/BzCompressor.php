<?php

namespace Subapp\Pack\Compressor;

/**
 * Class BzCompressor
 * @package Subapp\Pack\Compressor
 */
class BzCompressor implements CompressorInterface
{
    /**
     * @var int
     */
    private $level = 1;
    
    /**
     * GzCompressor constructor.
     * @param int $level
     */
    public function __construct($level = 1)
    {
        $this->level = $level;
    }
    
    /**
     * @inheritDoc
     */
    public function compress($uncompressed)
    {
        return bzcompress($uncompressed, $this->level);
    }
    
    /**
     * @inheritDoc
     */
    public function decompress($compressed)
    {
        return bzdecompress($compressed);
    }
    
}