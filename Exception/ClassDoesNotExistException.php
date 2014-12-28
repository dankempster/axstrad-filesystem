<?php
namespace Axstrad\Component\Filesystem\Exception;


/**
 * Axstrad\Component\Filesystem\Exception\ClassDoesNotExistException
 */
class ClassDoesNotExistException extends RuntimeException
{
    public static function create($class, $code = null, \Exception $previous = null)
    {
        $exception = get_called_class();
        return new $exception(
            sprintf("The class '%s' doesn't exist.", $class),
            is_int($code) ? $code : null,
            $previous
        );
    }
}
