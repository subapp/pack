<?php

namespace Subapp\Pack\Accessor;

/**
 * Class AbstractAccessor
 * @package Subapp\Pack\Accessor
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