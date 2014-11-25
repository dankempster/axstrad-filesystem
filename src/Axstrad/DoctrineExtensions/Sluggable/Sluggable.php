<?php
namespace Axstrad\DoctrineExtensions\Sluggable\Sluggable;

use Gedmo\Sluggable\Sluggable as BaseInterface;


/**
 * Axstrad\DoctrineExtensions\Sluggable\Sluggable\Sluggable
 */
interface Sluggable extends BaseInterface
{
    /**
     * @return string
     */
    public function getSlug();
}
