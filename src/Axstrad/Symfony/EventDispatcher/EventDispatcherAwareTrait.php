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

namespace Axstrad\Symfony\EventDispatcher;

use Symfony\Component\EventDispatcher\EventDispatcher;


/**
 * Axstrad\Symfony\EventDispatcher\EventDispatcherAwareTrait
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @package Axstrad\Symfony
 * @subpackage EventDispatcher
 */
trait EventDispatcherAwareTrait
{
    /**
     * @var EventDispatcher
     */
    protected $eventDispatcher;


    /**
     * Get eventDispatcher
     *
     * @return EventDispatcher
     * @see setEventDispatcher
     */
    public function getEventDispatcher()
    {
        return $this->eventDispatcher;
    }

    /**
     * Set eventDispatcher
     *
     * @param EventDispatcher $eventDispatcher
     * @return self
     * @see getEventDispatcher
     */
    public function setEventDispatcher(EventDispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;

        return $this;
    }
}
