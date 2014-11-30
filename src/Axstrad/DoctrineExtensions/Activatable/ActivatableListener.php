<?php
/**
 * This file is part of the Axstrad library.
 *
 * (c) Dan Kempster <dev@dankempster.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @package Axstrad\DoctineExtensions
 */
namespace Axstrad\DoctrineExtensions\Activatable;

use Doctrine\Common\EventArgs;
use Gedmo\Mapping\MappedEventSubscriber;


/**
 * Axstrad\DoctrineExtensions\Activatable\ActivatableListener
 */
class ActivatableListener extends MappedEventSubscriber
{
    /**
     */
    public function getSubscribedEvents()
    {
        return array(
            'loadClassMetadata',
        );
    }

    /**
     * Mapps additional metadata
     *
     * @param EventArgs $eventArgs
     * @return void
     */
    public function loadClassMetadata(EventArgs $eventArgs)
    {
        $ea = $this->getEventAdapter($eventArgs);
        $this->loadMetadataForObjectClass($ea->getObjectManager(), $eventArgs->getClassMetadata());
    }

    /**
     * {@inheritDoc}
     */
    public function getNamespace()
    {
        return __NAMESPACE__;
    }
}
