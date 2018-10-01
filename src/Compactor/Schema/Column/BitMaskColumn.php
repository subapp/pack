<?php

namespace Subapp\Pack\Compactor\Schema\Column;

use Subapp\Pack\Compactor\Collection\Columns;
use Subapp\Pack\Compactor\Schema\Type\BooleanListType;
use Subapp\Pack\Compactor\Schema\Type\Type;

/**
 * Class BitMaskValue
 * @package Subapp\Pack\Compactor\Schema\Column
 */
class BitMaskColumn extends IntegerColumn implements ColumnsKeeperInterface
{

    /**
     * @var BooleanColumn[]|Columns
     */
    private $columns;

    /**
     * @inheritDoc
     */
    public function __construct($name, $length, $position, BooleanColumn ...$columns)
    {
        parent::__construct($name, null, $length, $position);

        $this->columns = new Columns($columns);
        $this->setBitCount(count($columns));
    }

    /**
     * @return Columns|BooleanColumn[]
     */
    public function getColumns()
    {
        return $this->columns->getColumns();
    }
    
    /**
     * @param $bitCount
     */
    public function setBitCount($bitCount)
    {
        /** @var BooleanListType $columnType */
        $columnType = $this->getType();
        $columnType->setBitCount($bitCount);
    }

    /**
     * @inheritDoc
     */
    public function getTypeName()
    {
        return Type::BOOLEAN_LIST;
    }

}