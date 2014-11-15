<?php
namespace Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional;

use Axstrad\Bundle\TestBundle\Functional\WebTestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\CanUploadFileTest
 */
class CanUploadFileTest extends WebTestCase
{
    /**
     */
    protected function loadSchema()
    {
        return true;
    }

    /**
     */
    protected function loadSchemaQuietly()
    {
        return true;
    }

    /**
     */
    public function tearDown()
    {
        $em = self::$kernel->getContainer()->get('doctrine.orm.entity_manager');

        $files = $em
            ->getRepository('Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity\File')
            ->findAll();
        foreach ($files as $file) {
            $file->removeUpload();
        }

        $events = $em
            ->getRepository('Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity\Event')
            ->findAll();
        foreach ($events as $event) {
            $event->removeUpload();
        }
    }

    /**
     * @test
     */
    public function testFileUpload()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/upload-file');

        $form = $crawler->selectButton('Submit')->form();
        $form['form[file]']->upload(__DIR__.'/Resources/assets/hello-world.txt');

        $crawler = $client->submit($form);

        $this->assertTrue(
            $client->getResponse()->isRedirect('/upload-file'),
            "Action didn't redirect, this probably means the form submission failed validation"
        );

        $em = self::$kernel->getContainer()->get('doctrine.orm.entity_manager');

        $file = $em
            ->getRepository('Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity\File')
            ->find(1);

        $this->assertNotNull(
            $file,
            "Failed to load new File entity, was it persistsed/flushed?"
        );

        $this->assertTrue(
            file_exists($file->getAbsolutePath()),
            "Uploaded file doesn't exist. Expected it at ".$file->getAbsolutePath()
        );
    }

    /**
     * @test
     */
    public function testFileUploadWithOtherProperties()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/create-event');

        $form = $crawler->selectButton('Submit')->form();
        $form['form[file]']->upload(__DIR__.'/Resources/assets/hello-world.txt');
        $form['form[title]'] = "Foo";

        $crawler = $client->submit($form);

        $this->assertTrue(
            $client->getResponse()->isRedirect('/create-event'),
            "Action didn't redirect, this probably means the form submission failed validation"
        );

        $em = self::$kernel->getContainer()->get('doctrine.orm.entity_manager');

        $event = $em
            ->getRepository('Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity\Event')
            ->findOneBy(array('title' => 'Foo'));

        $this->assertNotNull(
            $event,
            "Failed to load new File entity, was it persistsed/flushed?"
        );

        $this->assertTrue(
            file_exists($event->getAbsolutePath()),
            "Uploaded file doesn't exist. Expected it at ".$event->getAbsolutePath()
        );
    }
}
