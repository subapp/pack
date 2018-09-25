<?php

namespace Subapp\Pack\Compactor\ValueCompactor;

use Subapp\Pack\Compactor\Accessor\AccessorInterface;
use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;

/**
 * Interface ValueCompacterInterface
 * @package Subapp\Pack\Compactor\ValueCompactor
 */
interface ValueCompactorInterface
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