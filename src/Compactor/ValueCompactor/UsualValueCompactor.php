<?php

namespace Subapp\Pack\Compactor\ValueCompactor;

use Subapp\Pack\Compactor\Accessor\AccessorInterface;
use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;

/**
 * Class UsualValueCompactor
 * @package Subapp\Pack\Compactor\ValueCompactor
 */
class UsualValueCompactor extends AbstractValueCompactor
{
    
    /**
     * @inheritDoc
     */
    public function collapse(ColumnInterface $column, AccessorInterface $input, AccessorInterface $output)
    {
        $output->setValue($column->getName(), $this->collapseValue($column, $input));
    }
    
    /**
     * @inheritDoc
     */
    public function expand(ColumnInterface $column, AccessorInterface $input, AccessorInterface $output)
    {
        $output->setValue($column->getColumnName(), $this->expandValue($column, $input));
    }
    
}