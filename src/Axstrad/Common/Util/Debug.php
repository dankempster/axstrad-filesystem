<?php
namespace Axstrad\Common\Util;

use Axstrad\Common\Util\ArrayUtil;
use Doctrine\Common\Util\Debug as BaseDebug;


/**
 * Axstrad\Common\Util\Debug
 */
class Debug
{
    public static $options = array(
        'varDump' => array(
            'string' => array(
                'max' => 20,
            ),
        ),
    );

    /**
     */
    public static function dump($var, $maxDepth = 2, $stripTags = true)
    {
        if (extension_loaded('xdebug')) {
            $originalMaxDepth = ini_get('xdebug.var_display_max_depth');
        }

        $return = BaseDebug::dump($var, $maxDepth, $stripTags);

        if (extension_loaded('xdebug')) {
            ini_set('xdebug.var_display_max_depth', $originalMaxDepth);
        }

        return $return;
    }

    /**
     * @param mixed $var
     * @return string
     * @uses Doctrine\Common\Util\Debug::toString when $var is an object
     * @uses summariseScalar When $var is a scalar value
     * @uses summariseArray When $var is an array
     */
    public static function summarise($var)
    {
        if (is_object($var)) {
            return BaseDebug::toString($var);
        }
        elseif (is_scalar($var)) {
            return self::summariseScalar($var);
        }
        elseif (is_array($var)) {
            return self::summariseArray($var);
        }

        return $var === null ? 'Null' : (string) $var;
    }

    /**
     * Summarises a scalar value.
     *
     * @param boolean|integer|float|string $var
     * @return string
     */
    private static function summariseScalar($var)
    {
        if (is_numeric($var)) {
            return (string) $var;
        }
        elseif (is_bool($var)) {
            return $var ? 'True' : 'False';
        }

        return '"'.StrUtil::ellipse($var, self::getOption('varDump.string.max')).'"';
    }

    /**
     * Summarises an array
     *
     * @param array $var
     * @return string
     */
    private static function summariseArray(array $var, $depth = 1)
    {
        static $depth = 1;

        if ($depth == 2) {
            return 'Array('.count($var).')';
        }
        elseif (($count = count($var)) > 0) {

            $key = array_keys($var);
            $key = $key[0];
            $value = array_values($var);
            $value = $value[0];

            $mask = 'Array(%1$s){';
            if (is_string($key)) {
                $mask .= '%2$s: ';
            }
            $mask .= '%3$s}';

            $depth = 2;
            $return = sprintf(
                $mask,
                $count,
                $key,
                self::summarise($value)
            );
            $depth = 1;
            return $return;
        }

        return 'Array(0){}';
    }

    protected static function getOption($path)
    {
        return ArrayUtil::get($path, self::$options);
    }
}
