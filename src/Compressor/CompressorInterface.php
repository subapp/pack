<?php

namespace Subapp\Pack\Compressor;

/**
 * Interface CompressorInterface
 * @package Subapp\Pack\Compressor
 */
interface CompressorInterface
{
    
    /**
     * @param string $uncompressed
     * @return string
     */
    public function compress($uncompressed);
    
    /**
     * @param string $compressed
     * @return string
     */
    public function decompress($compressed);
    
}