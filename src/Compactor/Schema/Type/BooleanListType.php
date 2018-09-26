<?php

namespace Subapp\Pack\Compactor\Schema\Type;

/**
 * Class BooleanListType
 * @package Subapp\Pack\Compactor\Schema\Type
 */
class BooleanListType extends IntegerType
{

    const INT32 = 32;
    const INT64 = 64;
    
    /**
     * @inheritDoc
     */
    public function toPhpValue($int)
    {
        $values = [];

        foreach (range(0, $this->getBitCount() - 1) as $index) {
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
    
    /**
     * @param $bitCount
     */
    public function setBitCount($bitCount)
    {
        $extra = $this->getExtra();
        $extra['bitCount'] = (int)min($bitCount, self::INT32);
        $this->setExtra($extra);
    }
    
    /**
     * @return int
     */
    public function getBitCount()
    {
        $extra = $this->getExtra();

        return $extra['bitCount'] ?? self::INT32;
    }

}