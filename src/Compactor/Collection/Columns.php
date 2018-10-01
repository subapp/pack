<?php

namespace Subapp\Pack\Compactor\Collection;

use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;
use Subapp\Pack\Compactor\Schema\Column\ColumnsKeeperInterface;

/**
 * Class Columns
 * @package Subapp\Pack\Compactor\Collection
 */
class Columns extends Collection implements ColumnsKeeperInterface
{
    
    /**
     * @inheritDoc
     */
    public function __construct(array $columns = [])
    {
        parent::__construct($columns, ColumnInterface::class);
    }
    
    /**
     * @inheritDoc
     */
    public function getColumns()
    {
        return $this->sort(function (ColumnInterface $a, ColumnInterface $b) {
            return ($a->getPosition() - $b->getPosition());
        });
    }
    
}