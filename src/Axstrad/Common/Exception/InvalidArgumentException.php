<?php
namespace Axstrad\Common\Exception;

use Axstrad\Common\Util\Debug;


/**
 * Axstrad\Common\Exception\InvalidArgumentException
 */
class InvalidArgumentException extends \InvalidArgumentException implements
    Exception
{
    /**
     * Invalid Argument exception factory
     *
     * @param string $expected
     * @param mixed $actual
     * @param null|integer $paramNo
     * @param null|integer $code
     * @param null|\Exception $previous
     * @return InvalidArgumentException A new instance of self
     */
    public static function create(
        $expected,
        $actual,
        $paramNo = null,
        $code = null,
        $previous = null
    ) {
        $msgMsk = 'Expected %1$s. Got %2$s';

        if ($paramNo !== null) {
            $msgMsk = 'Param #%3$s '.lcfirst($msgMsk);
        }

        if ($code !== null) {
            $msgMsk = '[%4$s] '.$msgMsk;
        }

        $class = get_called_class();
        return new $class(
            sprintf(
                $msgMsk,
                $expected,
                Debug::summarise($actual),
                $paramNo,
                $code
            ),
            is_int($code) ? $code : null,
            $previous
        );
    }
}
