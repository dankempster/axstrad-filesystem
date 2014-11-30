<?php
namespace Axstrad\Common\Traits;


/**
 * Axstrad\Common\Traits\NullableNameTrait
 */
trait NullableNameTrait
{
    use NameTrait;


    /**
     * Set name
     *
     * @param null|string $name
     * @return self
     * @see getTitle
     */
    public function setName($name = null)
    {
        if ($name === null) {
            $this->name = null;
        }
        else {
            $this->name = (string) $name;
        }
        return $this;
    }
}
