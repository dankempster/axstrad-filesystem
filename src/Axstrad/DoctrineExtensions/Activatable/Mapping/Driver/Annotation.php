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
namespace Axstrad\DoctrineExtensions\Activatable\Mapping\Driver;

use Axstrad\DoctrineExtensions\Activatable\Mapping\Validator;
use Axstrad\DoctrineExtensions\Exception\InvalidMappingException;
use Doctrine\Common\Persistence\Mapping\ClassMetadata;
use Gedmo\Mapping\Driver\AbstractAnnotationDriver;


/**
 * Axstrad\DoctrineExtensions\Activatable\Mapping\Driver\Annotation
 *
 * This is an annotation mapping driver for Activatable
 * behavioral extension. Used for extraction of extended
 * metadata from Annotations specificaly for Activatable
 * extension.
 */
class Annotation extends AbstractAnnotationDriver
{
    /**
     * Annotation to define that this object is activatable
     */
    const ACTIVATABLE = 'Axstrad\\DoctrineExtensions\\Mapping\\Annotation\\Activatable';


    /**
     * {@inheritDoc}
     */
    public function readExtendedMetadata($meta, array &$config)
    {
        $class = $this->getMetaReflectionClass($meta);

        // class annotations
        if ($class !== null &&
            $annot = $this->reader->getClassAnnotation($class, self::ACTIVATABLE)
        ) {
            $config['activatable'] = true;

            Validator::validateField($meta, $annot->fieldName);

            $config['fieldName'] = $annot->fieldName;
        }

        $this->validateFullMetadata($meta, $config);
    }
}
