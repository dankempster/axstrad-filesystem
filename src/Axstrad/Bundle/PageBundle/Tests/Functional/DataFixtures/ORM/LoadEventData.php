<?php
namespace Axstrad\Bundle\PageBundle\Tests\Functional\DataFixtures\ORM;

use Axstrad\Bundle\PageBundle\Tests\Functional\Entity\Event;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Cmf\Bundle\SeoBundle\Model\SeoMetadata;


/**
 * Axstrad\Bundle\PageBundle\Tests\Functional\DataFixtures\ORM\LoadEventData
 */
class LoadEventData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $event = new Event();
        $event->setHeading('An Event');
        $event->setCopy('<p>Our first event.</p>');
        $event->setSlug('an-event');
        $manager->persist($event);

        $eventSeo = new SeoMetadata();
        $eventSeo->setMetaDescription('Meta description for an event.');
        $eventSeo->setMetaKeywords('an, event');
        $eventSeo->setTitle('An Event');
        $manager->persist($eventSeo);

        $event->setSeoMetadata($eventSeo);

        $manager->flush();
    }
}
