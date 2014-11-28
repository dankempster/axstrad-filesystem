<?php
namespace Axstrad\Component\Content\Traits;


/**
 * Axstrad\Bundle\ContentBundle\Traits\Article
 */
trait Article
{
    use Copy {
        Copy::setCopy as private _setCopy;
    }


    /**
     * @var string $heading the content's heading
     */
    protected $heading;

    /**
     * Set heading
     *
     * @param string $heading
     * @return self
     */
    public function setHeading($heading)
    {
        $this->heading = (string) $heading;
        return $this;
    }

    /**
     * Get heading
     *
     * @return string
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * Set Copy
     *
     * @param string $copy
     * @return self
     */
    public function setCopy($copy = null)
    {
        if ($copy === null) {
            $this->copy = null;
            return $this;
        }

        return $this->_setCopy($copy);
    }
}
