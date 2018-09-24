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
     * @return \Subapp\Pack\Compactor\Schema\SchemaInterface
     */
    protected function loadSchema(Version $version)
    {
        $factory = new SchemaBuilderFactory();
        $builder = $factory->getSchemaBuilder($version, 'Subapp\\TestApp\\Builder');

        return $builder->getSchema();
    }

}