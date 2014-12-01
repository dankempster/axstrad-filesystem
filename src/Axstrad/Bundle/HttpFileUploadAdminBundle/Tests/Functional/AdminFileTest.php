<?php
namespace Axstrad\Bundle\HttpFileUploadAdminBundle\Tests\Functional;

use Axstrad\Bundle\TestBundle\Functional\WebTestCase;
use Axstrad\Bundle\HttpFileUploadBundle\Model\File;
use Axstrad\Bundle\HttpFileUploadBundle\Model\FileAware;
use Symfony\Component\PropertyAccess\PropertyAccessor;


class AdminFileUploadTest extends WebTestCase
{
    public function uploadFileData()
    {
        return array(
            // Test uploading just a file
            array(
                '/admin/axstrad/testhttpfileupload/file/create',
                'Axstrad\Bundle\HttpFileUploadAdminBundle\Tests\Functional\Entity\File',
            ),

            // Test submitting properties with a file upload
            array(
                '/admin/axstrad/testhttpfileupload/image/create',
                'Axstrad\Bundle\HttpFileUploadAdminBundle\Tests\Functional\Entity\Image',
                array(
                    '[title]' => 'An Image',
                    '[altText]' => 'An Image alttext',
                ),
                array(
                    'title' => 'An Image',
                    'altText' => 'An Image alttext',
                )
            ),

            // Test file upload with associated entity
            array(
                '/admin/axstrad/testhttpfileupload/page/create',
                'Axstrad\Bundle\HttpFileUploadAdminBundle\Tests\Functional\Entity\Page',
                array(
                    '[heading]' => 'A Page',
                    '[copy]' => 'Bar',
                    '[image][title]' => 'Page image',
                    '[image][altText]' => 'Page image alt text',
                ),
                array(
                    'heading' => 'A Page',
                    'copy' => 'Bar',
                    'image.title' => 'Page image',
                    'image.altText' => 'Page image alt text',
                ),
                '[image][file]'
            ),
        );
    }

    /**
     * @dataProvider uploadFileData
     * @param string $url URL of the upload file form
     * @param string $entityClass Classname of entity that will be persisted on
     *        successful form submission.
     * @param array $formValues Additional form input values to set
     * @param array $entityAssertions Assertions to make after form submission
     * @param string $fileInputFilter Filter to use to select the form's file
     *        field
     */
    public function testAdminCanUploadFile(
        $url,
        $entityClass,
        array $formValues = array(),
        array $entityAssertions = array(),
        $fileInputFilter = '[file]'
    ) {
        $client = static::createClient();

        // Crawl create page
        $crawler = $client->request('GET', $url);
        $response = $client->getResponse();
        if (!$response->isSuccessful()) {
            $this->assertEquals(
                200,
                $response->getStatusCode(),
                'Failed to return successful response for URL '.$url
            );
        }

        // Find the form on the page
        $button = $crawler->selectButton('btn_create_and_return_to_list');
        $form = $button->form();

        // Get form ID
        $node = $form->getFormNode();
        $actionUrl = $node->getAttribute('action');
        $uniqId = substr(strchr($actionUrl, '='), 1);

        // Populate form
        $form[$uniqId.$fileInputFilter]->upload(__DIR__.'/Resources/assets/hello-world.txt');
        if (!isset($form[$uniqId.$fileInputFilter])) {
            $this->assertTrue(false,
                'Form input '.$uniqId.$fileInputFilter.' doesn\'t exist'
            );
        }
        foreach($formValues as $input => $value) {
            if (!isset($form[$uniqId.$input])) {
                $this->assertTrue(false,
                    'Form input '.$uniqId.$input.' doesn\'t exist'
                );
            }
            $form[$uniqId.$input] = $value;
        }

        // Submit form
        $client->submit($form);

        // If we have a 302 redirect, then all is well
        $response = $client->getResponse();
        $this->assertEquals(302, $response->getStatusCode());

        // assert entity was created
        $em = self::$kernel->getContainer()->get('doctrine.orm.entity_manager');
        $entity = $em->find($entityClass, 1);
        $this->assertNotNull(
            $entity,
            "Failed to load new File entity, was it persistsed/flushed?"
        );

        // Assert entity values
        $accessor = new PropertyAccessor;
        foreach ($entityAssertions as $property => $value) {
            $this->assertEquals(
                $value,
                $accessor->getValue($entity, $property),
                '$'.$property.' doesn\'t match expected value'
            );
        }

        // Assert file was uploaded
        if ($entity instanceof File) {
            $file = $entity;
        }
        elseif ($entity instanceof FileAware) {
            $file = $entity->getFile();
        }
        $this->assertTrue(
            file_exists($file->getAbsolutePath()),
            "Uploaded file doesn't exist. Expected it at ".$file->getAbsolutePath()
        );

        // Clean up
        $entities = $em
            ->getRepository($entityClass)
            ->findAll();
        foreach ($entities as $entity) {
            if ($entity instanceof File) {
                $file = $entity;
            }
            elseif ($entity instanceof FileAware) {
                $file = $entity->getFile();
            }
            $file->removeUpload();
        }
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
