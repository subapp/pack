<?php

namespace Subapp\Pack\Normalizer;

/**
 * Interface NormalizerInterface
 * @package Subapp\Pack\Normalizer
 */
interface NormalizerInterface
{

    /**
     * @return mixed
     */
    public function normalize();

    /**
     * @return mixed
     */
    public function denormalize();

}