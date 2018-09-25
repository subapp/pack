<?php

namespace Subapp\Pack\Compactor\Schema\Type;

/**
 * Class BooleanListType
 * @package Subapp\Pack\Compactor\Schema\Type
 */
class BooleanListType extends IntegerType
{

    /**
     * @inheritDoc
     */
    public function toPhpValue($int)
    {
        $values = [];

        foreach (range(0, log($int, 2)) as $index) {
            $values[$index] = (boolean)($int & (1 << $index));
        }

        return $values;
    }

    /**
     * @inheritDoc
     */
    public function toPlatformValue($booleanValues)
    {
        $value = 0;

        foreach ($booleanValues as $index => $booleanValue) {
            $value = ($value | ((1 * (int)$booleanValue) << $index));
        }

        return $value;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::INTEGER;
    }

}