<?php

namespace Subapp\Pack\Optimizer\Schema\Column;

use Subapp\Pack\Optimizer\Schema\Type\Type;

/**
 * Class CombinedColumn
 * @package Subapp\Pack\Optimizer\Schema\Column
 */
class CombinedColumn extends AbstractColumnLength implements ColumnsKeeperInterface
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
    public function __construct($name, $length, $position, $separator, ColumnInterface ...$columns)
    {
        parent::__construct($name, null, $length, $position);
        
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
    public function getTypeName()
    {
        return Type::STRING;
    }
    
}