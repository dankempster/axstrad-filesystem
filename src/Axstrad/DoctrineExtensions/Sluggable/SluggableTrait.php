<?php
namespace Axstrad\DoctrineExtensions\Sluggable;


/**
 * Axstrad\DoctrineExtensions\Sluggable\SluggableTrait
 *
 * Provides the following fields
 *  - slug : string  - unique index
 */
trait SluggableTrait
{
    use Traits\SluggableMethods,
        Traits\SluggableProperties;
}
