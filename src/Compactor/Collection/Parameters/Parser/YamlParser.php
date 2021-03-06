<?php

namespace Subapp\Pack\Compactor\Collection\Parameters\Parser;

use Subapp\Pack\Compactor\Collection\Parameters\ParserInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * Class YamlParser
 * @package Subapp\Pack\Compactor\Collection\Parameters\Parser
 */
class YamlParser implements ParserInterface
{

    /**
     * @inheritDoc
     */
    public static function parse($contentString)
    {
        return Yaml::parse($contentString);
    }

    /**
     * @inheritDoc
     */
    public static function dump(array $parameters)
    {
        return Yaml::dump($parameters, 16);
    }

}