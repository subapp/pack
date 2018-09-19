<?php

namespace Subapp\Pack\Schema\Column;

/**
 * Class BitMaskValue
 * @package Subapp\Pack\Schema\Column
 */
class BitMaskColumn extends IntegerColumn
{

    private $values;

    /**
     * @inheritDoc
     */
    public function __construct($name, BooleanColumn ...$values)
    {
        parent::__construct($name, null, IntegerColumn::INT32);

        $this->values = $values;
    }

    /**
     * @return mixed
     */
    public function getValues()
    {
        return $this->values;
    }

}