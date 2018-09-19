<?php

namespace Subapp\Pack;

use Subapp\Pack\Schema\SchemaInterface;

/**
 * Class Packer
 * @package Subapp\Pack
 */
class Packer
{

    /**
     * @var SchemaInterface
     */
    private $schema;

    /**
     * Packer constructor.
     * @param SchemaInterface $schema
     */
    public function __construct(SchemaInterface $schema)
    {
        $this->schema = $schema;
    }

}