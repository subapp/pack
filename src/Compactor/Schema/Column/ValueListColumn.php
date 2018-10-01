<?php

namespace Subapp\Pack\Compactor\Schema\Column;

use Subapp\Pack\Compactor\Collection\Columns;
use Subapp\Pack\Compactor\Schema\Type\ArrayListType;
use Subapp\Pack\Compactor\Schema\Type\Type;

/**
 * Class CombinedColumn
 * @package Subapp\Pack\Compactor\Schema\Column
 */
class ValueListColumn extends AbstractColumnLength implements ColumnsKeeperInterface
{
    
    /**
     * @var Columns|ColumnInterface[]
     */
    private $columns = [];
    
    /**
     * @var string
     */
    private $separator;
    
    /**
     * @inheritDoc
     */
    public function __construct($name, $length, $position, $separator, ColumnInterface ...$columns)
    {
        parent::__construct($name, null, $length, $position);
        
        $this->separator = $separator;
        $this->columns = new Columns($columns);
    }
    
    /**
     * @return array|ColumnInterface[]
     */
    public function getColumns()
    {
        return $this->columns->getColumns();
    }
    
    /**
     * @return string
     */
    public function getSeparator()
    {
        return $this->separator;
    }

    /**
     * @inheritDoc
     */
    public function retrieveType()
    {
        /** @var ArrayListType $columnType */
        $columnType = parent::retrieveType();

        $columnType->setSeparator($this->getSeparator());

        return $columnType;
    }

    /**
     * @inheritDoc
     */
    public function getTypeName()
    {
        return Type::ARRAY_LIST;
    }
    
}