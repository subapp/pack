<?php

namespace Subapp\Pack\Transformer;

use Subapp\Pack\Accessor\AccessorInterface;
use Subapp\Pack\Schema\Column\ColumnInterface;

/**
 * Interface ValueTransformerInterface
 * @package Subapp\Pack\Transformer
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