<?php

namespace Subapp\Pack\Compactor\Accessor;

/**
 * Class AbstractAccessor
 * @package Subapp\Pack\Compactor\Accessor
 */
abstract class AbstractAccessor implements AccessorInterface
{
    
    /**
     * @var array|object
     */
    protected $source;
    
    /**
     * AbstractAccessor constructor.
     * @param $source
     */
    public function __construct($source)
    {
        $this->setSource($source);
    }
    
    /**
     * @inheritDoc
     */
    public function setSource($source)
    {
        $this->source = $source;
    }
    
    /**
     * @inheritDoc
     */
    public function getSource()
    {
        return $this->source;
    }
    
}