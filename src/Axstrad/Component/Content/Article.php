<?php
namespace Axstrad\Component\Content;


/**
 * Axstrad\Component\Content\Article
 */
interface Article extends Copy
{
    /**
     * Set Heading
     *
     * @param string $heading
     * @return self
     */
    public function setHeading($heading);

    /**
     * Get Heading
     *
     * @return string
     */
    public function getHeading();
}
