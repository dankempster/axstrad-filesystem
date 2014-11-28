<?php
namespace Axstrad\Bundle\SeoBundle\Tests\Functional\DataFixtures\ORM;

use Axstrad\Bundle\SeoBundle\Tests\Functional\Entity\Article;
use Axstrad\Bundle\SeoBundle\Tests\Functional\Entity\Page;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Cmf\Bundle\SeoBundle\Model\SeoMetadata;


/**
 * Axstrad\Bundle\SeoBundle\Tests\Functional\DataFixtures\ORM\LoadData
 */
class LoadData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $page = new Page('Testing');
        $manager->persist($page);

        $pageSeo = new SeoMetadata();
        $pageSeo->setMetaDescription('Testing meta description.');
        $pageSeo->setMetaKeywords('testing, meta, keywords');
        $pageSeo->setTitle('Testing Title');
        $manager->persist($pageSeo);

        $page->setSeoMetadata($pageSeo);

        $article = new Article('Article');
        $manager->persist($article);

        $manager->flush();
    }
}
