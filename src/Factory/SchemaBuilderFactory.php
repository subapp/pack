<?php

namespace Subapp\Pack\Factory;

use Subapp\Pack\Schema\Version;

/**
 * Class SchemaBuilderFactory
 * @package Subapp\Pack\Factory
 */
class SchemaBuilderFactory
{
    
    /**
     * @param Version $version
     * @param         $namespace
     * @return
     * @throws \RuntimeException
     */
    public function getSchemaBuilder(Version $version, $namespace)
    {
        $namespace = $this->normalizeNamespace($namespace);
        $class = sprintf('%s\\SchemaBuilder%s', $namespace, $version->getClassVersion());
        
        if (!class_exists($class)) {
            throw new \RuntimeException(sprintf('Could not be found builder class name %s', $class));
        }
        
        return new $class();
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