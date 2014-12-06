<?php
namespace Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\DataFixtures\ORM;

use Axstrad\Bundle\HttpFileUploadBundle\Entity\File;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use org\bovigo\vfs\vfsStream;
use Symfony\Cmf\Bundle\SeoBundle\Doctrine\Phpcr\SeoMetadata;

/**
 * Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\DataFixtures\ORM\LoadFileData
 */
class LoadFileData implements FixtureInterface
{
    public function load(ObjectManager $dm)
    {
        vfsStream::create(array(
            'web' => array(
                'upload' => array(
                    'my-document.txt' => 'A test document',
                ),
            )
        ));

        $file = new File();
        $file->setPath(vfsStream::url('web/upload/my-document.txt'));
        $dm->persist($file);
        $dm->flush();
    }
}
