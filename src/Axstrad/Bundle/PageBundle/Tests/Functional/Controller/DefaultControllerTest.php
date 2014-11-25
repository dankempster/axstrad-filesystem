<?php
namespace Axstrad\Bundle\PageBundle\Tests\Functional\Controller;

use Axstrad\Bundle\TestBundle\Functional\WebTestCase;

new \Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter(array());

class DefaultControllerTest extends WebTestCase
{
    protected $crawler;

    protected $response;

    /**
     * Load fixtures of these bundles
     *
     * @return array Bundles name where fixtures should be found
     */
    protected function loadBundlesFixtures()
    {
        return array(
            'AxstradTestPageBundle'
        );
    }

    public function setUp()
    {
        parent::setUp();

        $this->client = self::createClient();
        $this->crawler = $this->client->request('GET', '/about-us');
        $this->response = $this->client->getResponse();
    }

    public function testPageIsSuccessful()
    {
        $this->assertTrue(
            $this->response->isSuccessful(),
            'Request was not successful'
        );
    }

    public function testPageHasHeading()
    {
        $this->assertTrue(
            $this->crawler->filter('h1')->count() > 0
        );
    }

    public function testPageHasCorrectHeadingValue()
    {
        $this->assertEquals(
            'About Us',
            $this->crawler->filter('h1')->text()
        );
    }

    public function testPageHasCopy()
    {
        $this->assertEquals(
            'A page about us.',
            $this->crawler->filter('p')->text()
        );
    }
}
