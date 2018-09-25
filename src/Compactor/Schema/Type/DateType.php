<?php

namespace Subapp\Pack\Compactor\Schema\Type;

/**
 * Class DateType
 * @package Subapp\Pack\Compactor\Schema\Type
 */
class DateType extends DatetimeType
{

    /**
     * @inheritDoc
     */
    protected function getFormat()
    {
        return 'Y-m-d';
    }

}