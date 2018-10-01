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
        $hydrator = $this->getHydrator();

        /** @var SchemaColumn $column */
        $values = $this->getValue($column->getColumnName(), $input);
        $hydrator->extract($column->getSchema(), $values, $output);
    }
    
    /**
     * @inheritDoc
     */
    public function expand(ColumnInterface $column, AccessorInterface $input, AccessorInterface $output)
    {
        $hydrator = $this->getHydrator();

        /** @var SchemaColumn $column */
        $values = $hydrator->hydrate($column->getSchema(), $input, []);
        $this->setValue($column->getColumnName(), $values, $output);
    }
    
}