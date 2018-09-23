<?php

namespace Subapp\Pack\Optimizer\Hydrator;

use Subapp\Pack\Optimizer\Accessor\AccessorInterface;

/**
 * Interface NormalizerInterface
 * @package Subapp\Pack\Optimizer\Hydrator
 */
interface HydratorInterface
{
    
    /**
     * @param AccessorInterface $input
     * @param AccessorInterface $output
     * @return mixed
     */
    public function hydrate(AccessorInterface $input, AccessorInterface $output);
    
    /**
     * @param AccessorInterface $input
     * @param AccessorInterface $output
     * @return mixed
     */
    public function extract(AccessorInterface $input, AccessorInterface $output);

}