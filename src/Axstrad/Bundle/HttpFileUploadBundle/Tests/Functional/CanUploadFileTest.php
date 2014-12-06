<?php
namespace Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional;

use Axstrad\Bundle\HttpFileUploadBundle\Model\File;
use Axstrad\Bundle\HttpFileUploadBundle\Model\FileAware;
use Axstrad\Bundle\TestBundle\Functional\WebTestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\PropertyAccess\PropertyAccessor;


/**
 * Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\CanUploadFileTest
 */
class CanUploadFileTest extends WebTestCase
{
    public function dataProvider()
    {
        return array(
            array(
                '/upload-file',
                'Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity\File',
                array()
            ),

            array(
                '/create-image',
                'Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity\Image',
                array(
                    'image[title]' => 'An Image',
                    'image[altText]' => 'An Image alttext',
                ),
                array(
                    'title' => 'An Image',
                    'altText' => 'An Image alttext',
                ),
                'image[file]',
            ),

            array(
                '/create-page',
                'Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity\Page',
                array(
                    'form[heading]' => 'A Page',
                    'form[copy]' => 'Bar',
                    'form[image][title]' => 'Page image',
                    'form[image][altText]' => 'Page image alt text',
                ),
                array(
                    'heading' => 'A Page',
                    'copy' => 'Bar',
                    'image.title' => 'Page image',
                    'image.altText' => 'Page image alt text',
                ),
                'form[image][file]'
            ),
        );
    }

    /**
     * @dataProvider dataProvider
     * @param string $url URL of the upload file form
     * @param string $entityClass Classname of entity that will be persisted on
     *        successful form submission.
     * @param array $formValues Additional form input values to set
     * @param array $entityAssertions Assertions to make after form submission
     * @param string $fileInputFilter Filter to use to select the form's file
     *        field
     */
    public function testUploadFilePersistence(
        $url,
        $entityClass,
        array $formValues = array(),
        array $entityAssertions = array(),
        $fileInputFilter = 'form[file]'
    ) {
        $client = static::createClient();

        $crawler = $client->request('GET', $url);
        $response = $client->getResponse();
        if (!$response->isSuccessful()) {
            $this->assertEquals(
                200,
                $response->getStatusCode(),
                'Failed to return successful response for URL '.$url
            );
        }

        // Prepare the form
        $form = $crawler->selectButton('Submit')->form();
        if (!isset($form[$fileInputFilter])) {
            $this->assertTrue(false,
                'Form input '.$fileInputFilter.' doesn\'t exist'
            );
        }
        $form[$fileInputFilter]->upload(__DIR__.'/Resources/assets/hello-world.txt');
        foreach($formValues as $input => $value) {
            if (!isset($form[$input])) {
                $this->assertTrue(false,
                    'Form input '.$input.' doesn\'t exist'
                );
            }
            $form[$input] = $value;
        }

        // Submit form
        $crawler = $client->submit($form);

        // Assert entity was persisted
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
}
