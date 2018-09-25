<?php

namespace Subapp\Pack\Compactor\Schema\Type;

/**
 * Class TimeType
 * @package Subapp\Pack\Compactor\Schema\Type
 */
class TimeType extends DatetimeType
{

    /**
     * @inheritDoc
     */
    protected function getFormat()
    {
        return 'H:i:s';
    }

}