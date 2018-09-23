<?php

namespace Subapp\Pack;

use Subapp\Collection\Collection;
use Subapp\Pack\Common\Setup\SetupInterface;
use Subapp\Pack\Compressor\CompressorInterface;
use Subapp\Pack\Optimizer\Optimizer;
use Subapp\Pack\Serializer\SerializerInterface;

/**
 * Class Facade
 * @package Subapp\Pack
 */
class Facade
{
    
    /**
     * @var Collection|SerializerInterface[]
     */
    private $serializers;
    
    /**
     * @var Optimizer
     */
    private $optimizer;
    
    /**
     * @var CompressorInterface
     */
    private $compressor;
    
    /**
     * Facade constructor.
     */
    public function __construct()
    {
        $this->serializers = new Collection([], SerializerInterface::class);
    }
    
    /**
     * @param SetupInterface $setup
     */
    public function setup(SetupInterface $setup)
    {
        $setup->setup($this);
    }
    
    /**
     * @param SerializerInterface $serializer
     */
    public function addSerializer(SerializerInterface $serializer)
    {
        $this->serializers->append($serializer);
    }
    
    /**
     * @param Optimizer $optimizer
     */
    public function setOptimizer(Optimizer $optimizer)
    {
        $this->optimizer = $optimizer;
    }
    
    /**
     * @param CompressorInterface $compressor
     */
    public function setCompressor(CompressorInterface $compressor)
    {
        $this->compressor = $compressor;
    }
    
    /**
     * @return void
     */
    public function removeOptimizer()
    {
        $this->optimizer = null;
    }
    
    /**
     * @return void
     */
    public function removeCompressor()
    {
        $this->compressor = null;
    }
    
    /**
     * @return void
     */
    public function clearSerializers()
    {
        $this->serializers->clear();
    }
    
    /**
     * @return Optimizer
     */
    public function getOptimizer()
    {
        return $this->optimizer;
    }
    
    /**
     * @return CompressorInterface
     */
    public function getCompressor()
    {
        return $this->compressor;
    }
    
    /**
     * @return boolean
     */
    public function isOptimizerInitialized()
    {
        return $this->optimizer instanceof Optimizer;
    }
    
    /**
     * @return boolean
     */
    public function isCompressorInitialized()
    {
        return $this->compressor instanceof CompressorInterface;
    }
    
    /**
     * @param $values
     * @return null
     */
    public function serialize($values)
    {
        $processed = $values;
        
        if ($this->isOptimizerInitialized()) {
            $processed = $this->optimizer->pack($processed);
        }

        foreach ($this->serializers as $serializer) {
            $processed = $serializer->serialize($processed);
        }
    
        if ($this->isCompressorInitialized()) {
            $processed = $this->compressor->compress($processed);
        }
        
        return $processed;
    }
    
}