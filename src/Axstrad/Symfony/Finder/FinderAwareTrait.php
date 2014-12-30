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
 * Axstrad\Symfony\Finder\FinderAwareTrait
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @package Axstrad\Symfony
 * @subpackage Finder
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
