<?php

namespace Subapp\Pack\Hydrator;

use Subapp\Pack\Accessor\AccessorInterface;

/**
 * Interface NormalizerInterface
 * @package Subapp\Pack\Hydrator
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