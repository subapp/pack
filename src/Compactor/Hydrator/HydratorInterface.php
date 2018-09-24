<?php

namespace Subapp\Pack\Compactor\Hydrator;

use Subapp\Pack\Compactor\Accessor\AccessorInterface;

/**
 * Interface NormalizerInterface
 * @package Subapp\Pack\Compactor\Hydrator
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