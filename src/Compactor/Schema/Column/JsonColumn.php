<?php

namespace Subapp\Pack\Compactor\Schema\Column;

use Subapp\Pack\Compactor\Schema\Type\Type;

/**
 * Class JsonColumn
 * @package Subapp\Pack\Compactor\Schema\Column
 */
class JsonColumn extends StringColumn
{

    /**
     * @return string
     */
    public function getTypeName()
    {
        return Type::JSON;
    }

}