<?php
namespace Axstrad\DoctrineExtensions\Sluggable;

use Doctrine\ORM\Mapping as ORM;


/**
 * Axstrad\DoctrineExtensions\Sluggable\SluggableEntity
 *
 * Provides the following fields
 *  - slug : string  - unique index
 *
 * @ORM\MappedSuperclass()
 */
class SluggableEntity implements
    Sluggable
{
    use SluggableTrait;
}
