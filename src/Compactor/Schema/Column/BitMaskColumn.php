<?php

namespace Subapp\Pack\Compactor\Schema\Column;

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

}