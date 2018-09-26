<?php

namespace Subapp\Pack\Tests\Mock;

use Subapp\Pack\Compactor\Schema\Version;

/**
 * Class Version10001
 * @package Subapp\Pack\Tests\Mock
 */
class Version10001 extends Version
{
    /**
     * @inheritDoc
     */
    public function __construct()
    {
        parent::__construct(10001);
    }

}