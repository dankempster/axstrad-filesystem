<?php
namespace Axstrad\Common\Traits;


/**
 * Axstrad\Common\Traits\NullableTitleTrait
 */
trait NullableTitleTrait
{
    use TitleTrait;


    /**
     * Set title
     *
     * @param null|string $title
     * @return self
     * @see getTitle
     */
    public function setTitle($title = null)
    {
        if ($title === null) {
            $this->title = null;
        }
        else {
            $this->title = (string) $title;
        }
        return $this;
    }
}
