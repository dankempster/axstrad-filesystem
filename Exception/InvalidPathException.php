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

use Exception as BaseException;
use InvalidArgumentException as BaseInvalidArgumentException;

/**
 * Axstrad\Component\Filesystem\Exception\InvalidPathException
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 */
class InvalidPathException extends BaseInvalidArgumentException implements
    Exception
{
    /**
     * Create a new InvalidPathException
     *
     * @param string $path The invalid path
     * @param null|integer $code The error code
     * @param BaseException|null $previous Previous exception
     * @return InvalidArgumentException
     */
    public static function create(
        $path,
        $code = null,
        BaseException $previous = null
    ) {
        $class = get_called_class();
        return new $class(
            sprintf("The path '%s' doesn't exist.", $path),
            is_int($code) ? $code : null,
            $previous
        );
    }
}
