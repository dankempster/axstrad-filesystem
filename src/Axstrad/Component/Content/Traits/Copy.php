<?php
namespace Axstrad\Component\Content\Traits;


use Axstrad\Component\Content\Exception\InvalidArgumentException;

/**
 * Axstrad\Component\Content\Traits\Copy
 */
trait Copy
{
    /**
     * @var string $copy The copy
     */
    protected $copy;


    /**
     * Set Copy
     *
     * @param string $copy
     * @return self
     */
    public function setCopy($copy = null)
    {
        if (is_null($copy)) {
            $this->copy = null;
        }
        elseif (!is_scalar($copy)) {
            throw InvalidArgumentException::create(
                'string (or scalar)',
                $copy
            );
        }
        else {
            $this->copy = (string) $copy;
        }
        return $this;
    }

    /**
     * Get copy
     *
     * @return string
     */
    public function getCopy()
    {
        return $this->copy;
    }
}
