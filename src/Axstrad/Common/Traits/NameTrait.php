<?php
namespace Axstrad\Common\Traits;


/**
 * Axstrad\Common\Traits\NameTrait
 */
trait NameTrait
{
    /**
     * @var string
     */
    protected $name;


    /**
     * Get name
     *
     * @return string
     * @see setName
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param  string $name
     * @return self
     * @see getName
     */
    public function setName($name)
    {
        $this->name = (string) $name;
        return $this;
    }
}
