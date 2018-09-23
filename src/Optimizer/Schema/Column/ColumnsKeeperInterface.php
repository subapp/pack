<?php

namespace Subapp\Pack\Optimizer\Schema\Column;

/**
 * Interface ColumnsKeeperInterface
 * @package Subapp\Pack\Optimizer\Schema\Column
 */
interface ColumnsKeeperInterface
{
    
    /**
     * @return array|ColumnInterface[]
     */
    public function getColumns();
    
}