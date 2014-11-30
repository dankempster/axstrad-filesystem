<?php
namespace Axstrad\Common\Traits;


/**
 * Axstrad\Common\Traits\TitleTrait
 */
trait TitleTrait
{
    /**
     * @var string
     */
    protected $title;


    /**
     * Get title
     *
     * @return string
     * @see setTitle
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param  string $title
     * @return self
     * @see getTitle
     */
    public function setTitle($title)
    {
        $this->title = (string) $title;
        return $this;
    }
}
