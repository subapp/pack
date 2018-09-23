<?php

namespace Subapp\Pack\Schema\Column;

/**
 * Interface ColumnsKeeperInterface
 * @package Subapp\Pack\Schema\Column
 */
interface ColumnsKeeperInterface
{
    
    /**
     * @return array|ColumnInterface[]
     */
    public function getColumns();
    
}