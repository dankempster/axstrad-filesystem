<?php
namespace Axstrad\Component\Content\Exception;

/**
 * Axstrad\Component\Content\Exception\InvalidArgumentException
 */
class InvalidArgumentException extends \InvalidArgumentException implements
    Exception
{
    public static function create()
    {
        return new self;
    }
}
