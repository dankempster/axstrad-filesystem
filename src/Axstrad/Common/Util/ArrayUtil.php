<?php
/**
 * This file is part of the Axstrad library.
 *
 * (c) Dan Kempster <dev@dankempster.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @package Axstrad\Common
 * @subpackage Util
 */
namespace Axstrad\Common\Util;

use Axstrad\Common\Exception\InvalidArgumentException;


/**
 * Axstrad\Common\Util\ArrayUtil
 *
 * A collection of array functions.
 */
final class ArrayUtil
{
    /**
     * Decompiles an array path string into an array of the path elements.
     *
     * For example
     *
     *     $result = ArrayUtil::decompilePath('foo.doo.goo');
     *     $result = ArrayUtil::decompilePath('foo[doo][goo]');
     *     $result = ArrayUtil::decompilePath('[foo][doo][goo]');
     *
     *     // Outputs
     *     array(
     *         'foo',
     *         'doo',
     *         'goo',
     *     );
     *
     * @param  string $path
     * @return array
     */
    public static function decompilePath($path)
    {
        if (is_object($path) && !method_exists($path, '__toString')) {
            throw InvalidArgumentException::create('scalar', $path);
        }
        $path = (string) $path;

        if (preg_match('/^[a-z0-9_]*\./i', $path)) {
            return explode('.', $path);
        }
        else {
            $parts = array_filter(explode('[', $path), function(&$value) {
                $value = trim($value, ']');
                return !empty($value);
            });
            return array_values($parts);
        }
    }

    /**
     * Return a value from an array using an array path.
     *
     * If the $arrayPath's value doesn't exist within $array return $default.
     *
     * @param  string $arrayPath
     * @param  array  $array
     * @param  mixed  $default A default value to use if _key_ isn't set in _array_.
     * @return mixed
     * @uses   decompilePath To decompile $arrayPath.
     */
    public static function get($arrayPath, array $array, $default = null)
    {
        $pathKeys = self::decompilePath($arrayPath);

        $_a = $array;
        foreach ($pathKeys as $key) {
            if (!isset($_a[$key])) {
                return $default;
            } else {
                $_a = $_a[$key];
            }
        }

        return $_a;
    }

    /**
     * Merges any number of arrays / parameters recursively, replacing entries with string keys with values from latter
     * arrays.
     *
     * If the entry or the next value to be assigned is an array, then it automagically treats both arguments as an
     * array. Numeric entries are appended, not replaced, if the value doesn't already exist in the merged array
     * otherwise they're skipped.
     *
     * @return array The merged array
     */
    public static function mergeRecursiveDistinct()
    {
        $prepare = function ($arg) {
            return !is_array($arg) ? array($arg) : $arg;
        };
        $arguments = func_get_args();
        $base = $prepare(array_shift($arguments));

        foreach ($arguments as $argument) {

            $argument = $prepare($argument);

            foreach ($argument as $key => $value) {
                if (!is_numeric($key)) {
                    if (!array_key_exists($key, $base)
                        || (!is_array($value) && !is_array($base[$key]))
                    ) {
                        $base[$key] = $value;
                    } else {
                        $base[$key] = self::mergeRecursiveDistinct($base[$key], $value);
                    }
                } elseif (!in_array($value, $base)) {
                    $base[] = $value;
                }
            }
        }

        return $base;
    }

    /**
     * Tests if $array is an associative array.
     *
     * @param  array   $array
     * @return boolean        Returns true if just one key is a string, false otherwise.
     */
    public static function isAssociative(array $array)
    {
        return count(array_filter(array_keys($array), 'is_string')) > 0;
    }
}
