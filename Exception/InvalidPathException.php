<?php
namespace Axstrad\Component\Filesystem\Exception;


/**
 * Axstrad\Component\Filesystem\Exception\InvalidPathException
 */
class InvalidPathException extends InvalidArgumentException
{
    public static function create($path, $code = null, \Exception $previous = null)
    {
        $class = get_called_class();
        return new $class(
            sprintf("The path '%s' doesn't exist.", $path),
            is_int($code) ? $code : null,
            $previous
        );
    }
}
