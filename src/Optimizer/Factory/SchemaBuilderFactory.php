<?php

namespace Subapp\Pack\Optimizer\Factory;

use Subapp\Pack\Optimizer\Builder\SchemaBuilderInterface;
use Subapp\Pack\Optimizer\Schema\Version;

/**
 * Class SchemaBuilderFactory
 * @package Subapp\Pack\Optimizer\Factory
 */
class SchemaBuilderFactory
{
    
    /**
     * @param Version $version
     * @param         $namespace
     * @return SchemaBuilderInterface
     * @throws \RuntimeException
     */
    public function getSchemaBuilder(Version $version, $namespace)
    {
        $namespace = $this->normalizeNamespace($namespace);
        $class = sprintf('%s\\SchemaBuilder%s', $namespace, $version->getClassVersion());
        
        if (!class_exists($class)) {
            throw new \RuntimeException(sprintf('Could not be found builder class name %s', $class));
        }
        
        if (!is_subclass_of($class, SchemaBuilderInterface::class)) {
            throw new \RuntimeException(sprintf('Schema builder must implement %s interface', SchemaBuilderInterface::class));
        }
        
        return new $class($version);
    }
    
    /**
     * @param string $namespace
     * @return string
     */
    private function normalizeNamespace($namespace)
    {
        $namespace = trim($namespace, '\\');
        
        return sprintf('\\%s', $namespace);
    }
    
}