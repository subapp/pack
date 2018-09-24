<?php

namespace Subapp\Pack\Compressor;

/**
 * Class GzCompressor
 * @package Subapp\Pack\Compressor
 */
class GzCompressor implements CompressorInterface
{
    
    /**
     * @var int
     */
    private $level = 1;
    
    /**
     * @var int
     */
    private $encoding = ZLIB_ENCODING_RAW;
    
    /**
     * GzCompressor constructor.
     * @param int $level
     * @param int $encoding
     */
    public function __construct($level = 1, $encoding = ZLIB_ENCODING_RAW)
    {
        $this->level = $level;
        $this->encoding = $encoding;
    }
    
    /**
     * @inheritDoc
     */
    public function compress($uncompressed)
    {
        return gzcompress($uncompressed, $this->level, $this->encoding);
    }
    
    /**
     * @inheritDoc
     */
    public function decompress($compressed)
    {
        return gzdecode($compressed);
    }
    
}