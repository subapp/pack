<?php

namespace Subapp\Pack\Compactor\ValueCompactor;

use Subapp\Pack\Compactor\Accessor\AccessorInterface;
use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;
use Subapp\Pack\Compactor\Schema\Column\SchemaColumn;

/**
 * Class SchemaKeeperValueCompactor
 * @package Subapp\Pack\Compactor\ValueCompactor
 */
class SchemaKeeperValueCompactor extends AbstractValueCompactor
{
    
    /**
     * @inheritDoc
     */
    public function collapse(ColumnInterface $column, AccessorInterface $input, AccessorInterface $output)
    {
        /** @var SchemaColumn $column */
        $inner = $this->retrieveValue($column->getColumnName(), $input);
        
        $this->hydrator->extract($column->getSchema(), $inner, $output);
    }
    
    /**
     * @inheritDoc
     */
    public function expand(ColumnInterface $column, AccessorInterface $input, AccessorInterface $output)
    {
        /** @var SchemaColumn $column */
        $inner = $this->retrieveValue($column->getName(), $input);

        $this->hydrator->hydrate($column->getSchema(), $inner, $output);
        var_dump($inner);
//        $inner = $this->retrieveValue($column->getColumnName(), $input);
    }
    
}