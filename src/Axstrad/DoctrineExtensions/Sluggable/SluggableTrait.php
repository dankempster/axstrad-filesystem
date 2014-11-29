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
    /**
     * @var string The entity's slug
     */
    protected $slug;


    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get slug
     *
     * @param string $slug
     * @return self
     */
    public function setSlug($slug)
    {
        $this->slug = (string) $slug;
        return $this;
    }
}
