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
 * @package Axstrad\DoctineExtensions
 */
namespace Axstrad\DoctrineExtensions\Activatable\Mapping;

use Doctrine\Common\Persistence\Mapping\ClassMetadata;
use Gedmo\Exception\InvalidMappingException;


/**
 * Axstrad\DoctrineExtensions\Activatable\Mapping\Validator
 *
 * This class is used to validate mapping information
 */
class Validator
{
    /**
     * List of types which are valid for timestamp
     *
     * @var array
     */
    public static $validTypes = array(
        'boolean',
    );


    public static function validateField(ClassMetadata $meta, $field)
    {
        if ($meta->isMappedSuperclass) {
            return;
        }

        $fieldMapping = $meta->getFieldMapping($field);

        if (!in_array($fieldMapping['type'], self::$validTypes)) {
            throw new InvalidMappingException(sprintf('Field "%s" must be of one of the following types: "%s"',
                $fieldMapping['type'],
                implode(', ', self::$validTypes)));
        }
    }
}
