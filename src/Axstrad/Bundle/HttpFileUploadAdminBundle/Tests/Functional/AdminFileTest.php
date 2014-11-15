<?php
namespace Axstrad\Bundle\HttpFileUploadAdminBundle\Tests\Functional;

use Axstrad\Bundle\TestBundle\Functional\WebTestCase;


class AdminFileTest extends WebTestCase
{
    /**
     */
    public function tearDown()
    {
        $em = self::$kernel->getContainer()->get('doctrine.orm.entity_manager');

        $files = $em
            ->getRepository('Axstrad\Bundle\HttpFileUploadAdminBundle\Tests\Functional\Entity\File')
            ->findAll();
        foreach ($files as $file) {
            $file->removeUpload();
        }
    }

    public function testAdminCanUploadFile()
    {
        $client = static::createClient();

        // Crawl create page
        $crawler = $client->request('GET', '/admin/axstrad/httpfileupload/file/create');
        $res = $client->getResponse();
        $this->assertEquals(200, $res->getStatusCode());

        // populate and submit form
        $button = $crawler->selectButton('btn_create_and_return_to_list');
        $form = $button->form();
        $node = $form->getFormNode();
        $actionUrl = $node->getAttribute('action');
        $uniqId = substr(strchr($actionUrl, '='), 1);

        $form[$uniqId.'[file]']->upload(__DIR__.'/Resources/assets/hello-world.txt');

        $client->submit($form);

        // If we have a 302 redirect, then all is well
        $res = $client->getResponse();
        $this->assertEquals(302, $res->getStatusCode());


        // assert entity was created
        $em = self::$kernel->getContainer()->get('doctrine.orm.entity_manager');

        $file = $em
            ->getRepository('Axstrad\Bundle\HttpFileUploadBundle\Entity\File')
            ->find(1);

        $this->assertNotNull(
            $file,
            "Failed to load new File entity, was it persistsed/flushed?"
        );

        // assert entity's file was saved to filesystem
        $this->assertTrue(
            file_exists($file->getAbsolutePath()),
            "Uploaded file doesn't exist. Expected it at ".$file->getAbsolutePath()
        );
    }

    /**
     * @test
     */
    public function fileIsDeletedWhenAdminRemovesEntity()
    {
        // Load test fixtures

        // Delete a test fixture

        // Assert it's file was deleted from filesystem
    }
}
