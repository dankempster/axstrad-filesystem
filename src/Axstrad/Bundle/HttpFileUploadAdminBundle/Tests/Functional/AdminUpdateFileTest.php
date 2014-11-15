<?php
namespace Axstrad\Bundle\HttpFileUploadAdminBundle\Tests\Functional;

use Axstrad\Bundle\TestBundle\Functional\WebTestCase;


class AdminUpdateFileTest extends WebTestCase
{
    /**
     */
    protected function loadBundlesFixtures()
    {
        return array(
            'AxstradTestHttpFileUploadAdminBundle',
        );
    }

    /**
     * @test
     */
    public function noChangeIsPeristedWhenFileIsNotChangedTest()
    {
        // Crawl the edit page and submit the form without making a change

        // assert entity's path property has not changed

        // assert entity's file still exists on filesystem
    }

    /**
     * @test
     */
    public function canChangeExistingEntitysFileTest()
    {
        // Cralw edit page of fixture

        // upload new file to form and submit

        // assert the fixture's path property has changed

        // assert the fixtures old file has been deleted

        // assert the fixtures new file exists on filesystem
    }
}
