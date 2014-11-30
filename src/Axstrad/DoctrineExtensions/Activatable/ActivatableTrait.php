<?php
namespace Axstrad\DoctrineExtensions\Activatable;

use Doctrine\ORM\Mapping as ORM;


/**
 * Axstrad\DoctrineExtensions\Activatable\ActivatableTrait
 */
trait ActivatableTrait {

    /**
     * @ORM\Column(type="boolean", options={"default":true})
     * @var boolean
     */
    protected $active = true;

    /**
     * Get active
     *
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * Set active
     *
     * @param  boolean $active
     * @return self
     */
    public function setActive($active = true)
    {
        $this->active = $active === true;

        return $this;
    }
}
