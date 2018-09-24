<?php

namespace Subapp\Pack\Compactor\Schema\Column;

/**
 * Interface ColumnsKeeperInterface
 * @package Subapp\Pack\Compactor\Schema\Column
 */
interface ColumnsKeeperInterface
{
    
    /**
     * @return array|ColumnInterface[]
     */
    public function getColumns();
    
}