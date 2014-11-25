<?php
namespace Axstrad\Component\Content;


/**
 * Axstrad\Component\Content\Copy
 */
interface Copy
{
    /**
     * Set Copy
     *
     * @param string $copy
     * @return self
     */
    public function setCopy($copy = null);

    /**
     * Get Copy
     *
     * @return string
     */
    public function getCopy();
}
