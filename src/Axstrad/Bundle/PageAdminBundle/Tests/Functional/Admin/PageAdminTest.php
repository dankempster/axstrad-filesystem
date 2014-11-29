<?php
namespace Axstrad\Bundle\PageAdminBundle\Tests\Functional\Admin;

use Axstrad\Bundle\TestBundle\Functional\WebTestCase;


/**
 * Axstrad\Bundle\PageAdminBundle\Tests\Functional\Admin\PageAdminTest
 */
class PageAdminTest extends WebTestCase
{
    protected $client;

    public function setUp()
    {
        parent::setUp();

        $this->client = self::createClient();
    }

    public function loadBundlesFixtures()
    {
        return array(
            'AxstradTestPageAdminBundle',
        );
    }

    public function testContentList()
    {
        $crawler = $this->client->request('GET', '/admin/axstrad/page/page/list');
        $res = $this->client->getResponse();
        $this->assertEquals(200, $res->getStatusCode());
        $this->assertCount(1, $crawler->filter('html:contains("About Us")'));
    }

    public function testContentEdit()
    {
        $crawler = $this->client->request('GET', '/admin/axstrad/page/page/1/edit');
        $res = $this->client->getResponse();
        $this->assertEquals(200, $res->getStatusCode());
        $this->assertCount(1, $crawler->filter('input[value="about-us"]'));
    }

    public function testContentCreate()
    {
        $crawler = $this->client->request('GET', '/admin/axstrad/page/page/create');
        $res = $this->client->getResponse();
        $this->assertEquals(200, $res->getStatusCode());

        $button = $crawler->filter('[name="btn_create_and_list"]');
        $form = $button->form();
        $node = $form->getFormNode();
        $actionUrl = $node->getAttribute('action');
        $uniqId = substr(strchr($actionUrl, '='), 1);

        $form[$uniqId.'[heading]'] = 'Create Test';
        $form[$uniqId.'[copy]'] = '<p>Create copy</p>';

        $this->client->submit($form);
        $res = $this->client->getResponse();

        // If we have a 302 redirect, then all is well
        $this->assertEquals(302, $res->getStatusCode());
    }
}
