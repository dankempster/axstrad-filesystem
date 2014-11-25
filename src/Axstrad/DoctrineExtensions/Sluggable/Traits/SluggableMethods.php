<?php
namespace Axstrad\DoctrineExtensions\Sluggable\Traits;


/**
 * Axstrad\DoctrineExtensions\Sluhgable\Traits\SluggableMethods
 */
trait SluggableMethods
{
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
