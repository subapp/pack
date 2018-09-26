<?php

namespace Subapp\Pack\Common\Setup;

use Subapp\Pack\Compactor\Factory\SchemaBuilderFactory;
use Subapp\Pack\Compactor\Schema\Version;

/**
 * Class AbstractSetup
 * @package Subapp\Pack\Common\Setup
 */
abstract class AbstractSetup implements SetupInterface
{

    /**
     * @param Version $version
     * @param string $namespace
     * @return \Subapp\Pack\Compactor\Schema\SchemaInterface
     */
    protected function loadSchema(Version $version, $namespace)
    {
        $factory = new SchemaBuilderFactory();
        $builder = $factory->getSchemaBuilder($version, $namespace);

        return $builder->getSchema();
    }

}