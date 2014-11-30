<?php
namespace Axstrad\Bundle\SeoBundle\Tests\Functional;

use Axstrad\Bundle\TestBundle\Functional\WebTestCase;

new \Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter(array());

class SeoPageDataAnnotationTest extends WebTestCase
{
    /**
     * Load fixtures of these bundles
     *
     * @return array Bundles name where fixtures should be found
     */
    protected function loadBundlesFixtures()
    {
        return array(
            'AxstradTestSeoBundle'
        );
    }

    public function dataProvider()
    {
        $seoAwareExpectations = array(
            'title' => 'Testing Title',
            'keywords' => 'testing, meta, keywords',
            'description' => 'Testing meta description.',
        );

        $seoMetadataExpectations = array(
            'title' => 'Testing Title',
        );

        return array(
            // Seo Aware object tests
            array( '/seo-aware/1', $seoAwareExpectations ),
            array( '/seo-aware/scalar/1/page/1', $seoAwareExpectations ),
            array( '/seo-aware/article/1/page/1', $seoAwareExpectations ),
            array( '/seo-aware/page/1/article/1', $seoAwareExpectations ),

            // Seo Metadata object tests
            array( '/seo-metadata/1', $seoMetadataExpectations ),
            array( '/seo-metadata/scalar/1/data/1', $seoMetadataExpectations ),
            array( '/seo-metadata/article/1/data/1', $seoMetadataExpectations ),
            array( '/seo-metadata/data/1/article/1', $seoMetadataExpectations ),
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testAnnotationConfigurationVariations($url, $expectations)
    {
        $client = self::createClient();
        $crawler = $client->request('GET', $url);

        $this->assertEquals(
            $expectations['title'].' | AxstradTestSeoBundle',
            $crawler->filter('title')->text()
        );

        if (isset($expectations['keywords'])) {
            $this->assertEquals(
                $expectations['keywords'],
                $crawler->filter('meta[name="keywords"]')->attr('content')
            );
        }

        if (isset($expectations['description'])) {
            $this->assertEquals(
                $expectations['description'],
                $crawler->filter('meta[name="description"]')->attr('content')
            );
        }
    }
}
