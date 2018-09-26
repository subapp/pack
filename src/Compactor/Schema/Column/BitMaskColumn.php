<?php

namespace Subapp\Pack\Compactor\Schema\Column;

use Subapp\Pack\Compactor\Schema\Type\BooleanListType;
use Subapp\Pack\Compactor\Schema\Type\Type;

/**
 * Class BitMaskValue
 * @package Subapp\Pack\Compactor\Schema\Column
 */
class BitMaskColumn extends IntegerColumn implements ColumnsKeeperInterface
{

    /**
     * @var BooleanColumn[]
     */
    private $columns;

    /**
     * @inheritDoc
     */
    public function __construct($name, $length, $position, BooleanColumn ...$columns)
    {
        parent::__construct($name, null, $length, $position);

        $this->columns = $columns;
        $this->setBitCount(count($columns));
    }

    /**
     * @return array|BooleanColumn[]
     */
    public function getColumns()
    {
        uasort($this->columns, function (ColumnInterface $columnA, ColumnInterface $columnB) {
            return $columnA->getPosition() - $columnB->getPosition();
        });

        return $this->columns;
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