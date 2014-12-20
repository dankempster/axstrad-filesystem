<?php
namespace Axstrad\Symfony\EventDispatcher;

use Symfony\Component\EventDispatcher\EventDispatcher;


/**
 * Axstrad\Symfony\EventDispatcher\EventDispatcherAwareTrait
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
