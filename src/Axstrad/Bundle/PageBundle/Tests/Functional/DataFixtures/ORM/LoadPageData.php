<?php
namespace Axstrad\Bundle\PageBundle\Tests\Functional\DataFixtures\ORM;

use Axstrad\Bundle\PageBundle\Entity\Page;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Cmf\Bundle\SeoBundle\Model\SeoMetadata;


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

        $aboutUsSeo = new SeoMetadata();
        $aboutUsSeo->setMetaDescription('Meta description about us.');
        $aboutUsSeo->setMetaKeywords('about, us');
        $aboutUsSeo->setTitle('About Us');
        $manager->persist($aboutUsSeo);

        $aboutUs->setSeoMetadata($aboutUsSeo);

        $manager->flush();
    }
}
