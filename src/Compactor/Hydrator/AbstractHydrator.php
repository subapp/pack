<?php

namespace Subapp\Pack\Compactor\Hydrator;

use Subapp\Pack\Compactor\Factory\AccessorFactory;
use Subapp\Pack\Compactor\Factory\ValueCompactorFactory;

/**
 * Class AbstractHydrator
 * @package Subapp\Pack\Compactor\Hydrator
 */
abstract class AbstractHydrator implements HydratorInterface
{
    
    /**
     * @var ValueCompactorFactory
     */
    private $valueCompactorFactory;
    
    /**
     * @var AccessorFactory
     */
    private $accessorFactory;
    
    /**
     * DataHydrator constructor.
     */
    public function __construct()
    {
        $this->valueCompactorFactory = new ValueCompactorFactory($this);
        $this->accessorFactory = new AccessorFactory();
    }
    
    /**
     * @return ValueCompactorFactory
     */
    public function getValueCompactorFactory()
    {
        return $this->valueCompactorFactory;
    }
    
    /**
     * @return AccessorFactory
     */
    public function getAccessorFactory()
    {
        return $this->accessorFactory;
    }
    
}