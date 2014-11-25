<?php
namespace Axstrad\Bundle\PageBundle\Tests\Functional\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Axstrad\Bundle\PageBundle\Entity\Page;

/**
 * Axstrad\Bundle\PageBundle\Tests\Functional\DataFixtures\ORM\LoadPageData
 */
class LoadPageData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $aboutUs = new Page('About Us', '<p>A page about us.</p>');
        $aboutUs->setSlug('about-us');
        $aboutUs->setActive(true);
        $manager->persist($aboutUs);

        $manager->flush();
    }
}
