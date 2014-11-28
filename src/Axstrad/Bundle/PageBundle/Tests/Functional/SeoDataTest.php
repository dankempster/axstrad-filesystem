<?php
namespace Axstrad\Bundle\PageBundle\Tests\Functional;

use Axstrad\Bundle\TestBundle\Functional\WebTestCase;

new \Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter(array());

class SeoDataTest extends WebTestCase
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

    public function testPageHasTitle()
    {
        $this->assertEquals(
            'About Us | AxstradTestPageBundle',
            $this->crawler->filter('title')->text()
        );
    }

    public function testPageHasMetaKeywords()
    {
        $this->assertEquals(
            'about, us',
            $this->crawler->filter('meta[name="keywords"]')->attr('content')
        );
    }

    public function testPageHasMetaDescription()
    {
        $this->assertEquals(
            'Meta description about us.',
            $this->crawler->filter('meta[name="description"]')->attr('content')
        );
    }
}
