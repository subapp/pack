<?php

namespace Subapp\Pack\Compactor;

/**
 * Interface CompactorInterface
 * @package Subapp\Pack\Compactor
 */
interface CompactorInterface
{

    /**
     * @param mixed $values
     * @return mixed
     */
    public function compact($values);

    /**
     * @param $compacted
     * @return mixed
     */
    public function extend($compacted);

}