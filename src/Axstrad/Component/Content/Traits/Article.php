<?php
namespace Axstrad\Component\Content\Traits;


/**
 * Axstrad\Bundle\ContentBundle\Trait\Article
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
     * Trait constructor
     *
     * @param string $heading
     * @param string $copy
     * @return void
     * @uses setHeading
     * @uses setCopy
     */
    public function __construct($heading, $copy = null)
    {
        $this->setHeading($heading);
        $this->setCopy($copy);
    }

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
