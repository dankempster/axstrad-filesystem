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
 * Axstrad\Component\Filesystem\Exception\InvalidPathException
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
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
