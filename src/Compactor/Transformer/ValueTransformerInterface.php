<?php

namespace Subapp\Pack\Compactor\Transformer;

use Subapp\Pack\Compactor\Accessor\AccessorInterface;
use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;

/**
 * Interface ValueTransformerInterface
 * @package Subapp\Pack\Compactor\Transformer
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