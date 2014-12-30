<?php
/**
 * This file is part of the Axstrad library.
 *
 * (c) Dan Kempster <dev@dankempster.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright 2014-2015 Dan Kempster <dev@dankempster.co.uk>
 */

namespace Axstrad\Component\Filesystem\Exception;


/**
 * Axstrad\Component\Filesystem\Exception\ClassDoesNotExistException
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
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
