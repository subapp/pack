<?php

namespace Subapp\Pack\Serializer\Pack;

use Subapp\Pack\Schema\SchemaInterface;

/**
 * Class PatternBuilder
 * @package Subapp\Pack\Serializer\Pack
 */
final class PatternBuilder
{

    /**
     * @var SchemaInterface
     */
    private $schema;

    /**
     * PatternBuilder constructor.
     * @param SchemaInterface $schema
     */
    public function __construct(SchemaInterface $schema)
    {
        $this->schema = $schema;
    }

    /**
     * @return string
     */
    public function getPattern()
    {
        return null;
    }

}