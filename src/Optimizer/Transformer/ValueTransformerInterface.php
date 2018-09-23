<?php

namespace Subapp\Pack\Optimizer\Transformer;

use Subapp\Pack\Optimizer\Accessor\AccessorInterface;
use Subapp\Pack\Optimizer\Schema\Column\ColumnInterface;

/**
 * Interface ValueTransformerInterface
 * @package Subapp\Pack\Optimizer\Transformer
 */
interface ValueTransformerInterface
{
    
    /**
     * @param ColumnInterface   $column
     * @param AccessorInterface $input
     * @param AccessorInterface $output
     */
    public function collapse(ColumnInterface $column, AccessorInterface $input, AccessorInterface $output);
    
    /**
     * @param ColumnInterface   $column
     * @param AccessorInterface $input
     * @param AccessorInterface $output
     */
    public function expand(ColumnInterface $column, AccessorInterface $input, AccessorInterface $output);
    
}