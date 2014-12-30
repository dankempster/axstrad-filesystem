<?php
namespace Axstrad\Symfony\Finder;

use Symfony\Component\Finder\Finder;


/**
 * Axstrad\Symfony\Finder\FinderAwareTrait
 */
trait FinderAwareTrait
{
    /**
     * @var Finder
     */
    protected $finder;

    /**
     * Get finder
     *
     * @return Finder
     * @see setFinder
     */
    public function getFinder()
    {
        return $this->finder;
    }

    /**
     * Set finder
     *
     * @param  Finder $finder
     * @return self
     * @see getFinder
     */
    public function setFinder(Finder $finder)
    {
        $this->finder = $finder;

        return $this;
    }
}
