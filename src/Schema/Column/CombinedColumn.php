<?php

namespace Subapp\Pack\Schema\Column;

use Subapp\Pack\Schema\Type\Type;

/**
 * Class CombinedColumn
 * @package Subapp\Pack\Schema\Column
 */
class CombinedColumn extends AbstractColumn implements ColumnsKeeperInterface
{
    
    /**
     * @var array|ColumnInterface[]
     */
    private $columns = [];
    
    /**
     * @var string
     */
    private $separator;
    
    /**
     * @inheritDoc
     */
    public function __construct($name, $position, $separator, ColumnInterface ...$columns)
    {
        parent::__construct($name, null, $position);
        
        $this->separator = $separator;
        $this->columns = $columns;
    }
    
    /**
     * @return array|ColumnInterface[]
     */
    public function getColumns()
    {
        uasort($this->columns, function (ColumnInterface $columnA, ColumnInterface $columnB) {
            return $columnA->getPosition() - $columnB->getPosition();
        });
        
        return $this->columns;
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
    public function getPhpType()
    {
        return Type::STRING;
    }
    
}