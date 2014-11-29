<?php
namespace Axstrad\DoctrineExtensions\Sluggable;

use Gedmo\Sluggable\Sluggable as BaseInterface;


/**
 * Axstrad\DoctrineExtensions\Sluggable\Sluggable
 */
interface Sluggable extends BaseInterface
{
    /**
     * @return string
     */
    public function getSlug();
}
