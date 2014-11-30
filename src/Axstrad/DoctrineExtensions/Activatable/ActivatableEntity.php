<?php
namespace Axstrad\DoctrineExtensions\Activatable;

use Doctrine\ORM\Mapping as ORM;
use Axstrad\DoctrineExtensions\Mapping\Annotation as Axstrad;


/**
 * Axstrad\DoctrineExtensions\Activatable\ActivatableEntity
 *
 * @Axstrad\Activatable(fieldName="active")
 * @ORM\MappedSuperclass
 */
class ActivatableEntity
{
    use ActivatableTrait;
}
