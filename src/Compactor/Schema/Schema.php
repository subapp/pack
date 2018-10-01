<?php

namespace Subapp\Pack\Compactor\Schema;

use Subapp\Pack\Compactor\Collection\Columns;
use Subapp\Pack\Compactor\Schema\Column\ColumnInterface;

/**
 * Class Schema
 * @package Subapp\Pack\Compactor\Schema
 */
class Schema implements SchemaInterface
{

    /**
     * @var Version
     */
    private $version;

    /**
     * @var Columns
     */
    private $columns = [];

    /**
     * Schema constructor.
     * @param Version $version
     */
    public function __construct(Version $version)
    {
        $this->columns = new Columns();
        $this->version = $version;
    }

    /**
     * @inheritDoc
     */
    public function addColumn(ColumnInterface $value)
    {
        $this->columns->offsetSet($value->getName(), $value);
    }

    /**
     * @inheritDoc
     */
    public function getColumns()
    {
        return $this->columns->getColumns();
    }

    /**
     * @inheritDoc
     */
    public function getColumn($name)
    {
        return $this->columns->offsetGet($name);
    }

    /**
     * @inheritDoc
     */
    public function hasColumn($name)
    {
        return $this->columns->offsetExists($name);
    }

    /**
     * @inheritDoc
     */
    public function getVersion()
    {
        return $this->version;
    }
    
    /**
     * @return int
     */
    public function getByteSize()
    {
        $bytes = 0;
    
        foreach ($this->getColumns() as $column) {
            if (($length = $column->getLength()) === null) {
                $bytes = -1; break;
            }
    
            $bytes += $length;
        }
        
        return $bytes;
    }

}