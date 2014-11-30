<?php
namespace Axstrad\DoctrineExtensions\Mapping\Annotation;

/**
 * Annotations
 */
use Doctrine\Common\Annotations\Annotation;

/**
 * Axstrad\DoctrineExtensions\Mapping\Annotation\Activatable
 *
 * Group annotation for Activatable extension
 *
 * @Annotation
 * @Target("CLASS")
 */
final class Activatable extends Annotation
{
    /**
     * @var string
     */
    public $fieldName = 'active';
}
