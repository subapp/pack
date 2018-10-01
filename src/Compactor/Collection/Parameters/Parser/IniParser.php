<?php

namespace Subapp\Pack\Compactor\Collection\Parameters\Parser;

use Subapp\Pack\Compactor\Collection\Parameters\ParserInterface;

/**
 * Class IniParser
 * @package Subapp\Pack\Compactor\Collection\Parameters\Parser
 */
class IniParser implements ParserInterface
{

    /**
     * @inheritDoc
     */
    public static function parse($contentString, $separator = '.')
    {
        $parameters = parse_ini_string($contentString, INI_SCANNER_NORMAL);

        return static::toArray($parameters, $separator);
    }

    /**
     * @param iterable $parameters
     * @param string $separator
     * @return array
     */
    public static function toArray(iterable $parameters, $separator = '.')
    {
        $array = [];

        foreach ($parameters as $path => $parameter) {
            $temporary = &$array;

            foreach (explode($separator, $path) as $key) {
                $temporary = &$temporary[$key];
            }

            $temporary = $parameter;
        }

        unset($temporary);

        return $array;
    }

    /**
     * @inheritDoc
     */
    public static function dump(array $parameters, $separator = '.')
    {
        $lines = [sprintf('# Dumper Class: %s DateTime: %s', __CLASS__, (new \DateTime())->format(\DateTime::W3C))];

        static::dumpToLines($parameters, $separator, [], $lines);

        $lines = array_map(function ($key, $value) {
            return sprintf('%s="%s"', $key, addslashes($value));
        }, array_keys($lines), array_values($lines));

        return implode(PHP_EOL, $lines);
    }

    /**
     * @param array $parameters
     * @param string $separator
     * @return array
     */
    public static function toLines(array $parameters, $separator = '.')
    {
        static::dumpToLines($parameters, $separator, [], $lines);

        return $lines;
    }

    /**
     * @param array $parameters
     * @param string $separator
     * @param array $indexes
     * @param array $lines
     */
    private static function dumpToLines(array $parameters = [], $separator = '.', $indexes = [], &$lines = [])
    {
        foreach ($parameters as $index => $value) {
            $indexes[] = $index;

            if (is_array($value)) {
                static::dumpToLines($value, $separator, $indexes, $lines);
            } else {
                $lines[implode($separator, $indexes)] = $value;
            }

            array_pop($indexes);
        }
    }

}