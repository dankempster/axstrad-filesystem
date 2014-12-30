<?php
/**
 * This file is part of the Axstrad library.
 *
 * (c) Dan Kempster <dev@dankempster.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright 2014-2015 Dan Kempster <dev@dankempster.co.uk>
 */

namespace Axstrad\Symfony\Finder;

use Symfony\Component\Finder\Finder;


/**
 * Axstrad\Symfony\Finder\LazyLoadFinderTrait
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @package Axstrad\Symfony
 * @subpackage Finder
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
