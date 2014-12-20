<?php
namespace Axstrad\Symfony\Finder;

use Symfony\Component\Finder\Finder;


/**
 * Axstrad\Symfony\Finder\LazyLoadFinderTrait
 */
trait LazyLoadFinderTrait
{
    use FinderAwareTrait;


    /**
     * Get finder
     *
     * @return Finder
     * @see setFinder
     */
    public function getFinder()
    {
        if ($this->finder === null) {
            $this->finder = new Finder;
        }

        return $this->finder;
    }
}
