<?php

namespace Axstrad\Bundle\SeoBundle\Tests\Functional\Controller;

use Axstrad\Bundle\SeoBundle\Configuration\SeoPageData;
use Axstrad\Bundle\SeoBundle\Tests\Functional\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Cmf\Bundle\SeoBundle\Model\SeoMetadata;
use Symfony\Component\HttpFoundation\Response;

new Route(array());
new ParamConverter(array());
new SeoPageData(array());

/**
 * Axstrad\Bundle\SeoBundle\Tests\Functional\Controller\SeoMetadataController
 */
class SeoMetadataController extends Controller
{
    /**
     * @Route("/seo-metadata/{id}")
     * @ParamConverter("data")
     * @SeoPageData()
     */
    public function dataAction(SeoMetadata $data)
    {
        return new Response(
            $this->renderView(
                'AxstradSeoBundle::base.html.twig',
                array(
                    'data' => $data,
                )
            )
        );
    }

    /**
     * @Route("/seo-metadata/scalar/{index}/data/{id}")
     * @ParamConverter("data")
     * @SeoPageData()
     */
    public function scalarSeoMetadataAction($index, SeoMetadata $data)
    {
        return $this->dataAction($data);
    }

    /**
     * @Route("/seo-metadata/data/{data_id}/article/{article_id}")
     * @ParamConverter("data", options={"id": "data_id"})
     * @ParamConverter("article", options={"id": "article_id"})
     * @SeoPageData()
     * @param  SeoMetadata $data
     * @param  Article $article
     * @return Response
     */
    public function seoDataAwareAndArticleAction(SeoMetadata $data, Article $article)
    {
        return $this->dataAction($data);
    }

    /**
     * @Route("/seo-metadata/article/{article_id}/data/{data_id}")
     * @ParamConverter("data", options={"id": "data_id"})
     * @ParamConverter("article", options={"id": "article_id"})
     * @SeoPageData()
     * @param  SeoMetadata $data
     * @param  Article $article
     * @return Response
     */
    public function articleAndSeoMetadataAction(Article $article, SeoMetadata $data)
    {
        return $this->dataAction($data);
    }
}
