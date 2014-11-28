<?php

namespace Axstrad\Bundle\SeoBundle\Tests\Functional\Controller;

use Axstrad\Bundle\SeoBundle\Configuration\SeoPageData;
use Axstrad\Bundle\SeoBundle\Tests\Functional\Entity\Page as SeoDataAware;
use Axstrad\Bundle\SeoBundle\Tests\Functional\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

new Route(array());
new ParamConverter(array());
new SeoPageData(array());

/**
 * Axstrad\Bundle\SeoBundle\Tests\Functional\Controller\SeoDataAwareController
 */
class SeoDataAwareController extends Controller
{
    /**
     * @Route("/seo-aware/{id}")
     * @ParamConverter("page")
     * @SeoPageData()
     */
    public function seoDataAwareAction(SeoDataAware $page)
    {
        return new Response(
            $this->renderView(
                'AxstradSeoBundle::base.html.twig',
                array(
                    'page' => $page,
                )
            )
        );
    }

    /**
     * @Route("/seo-aware/scalar/{index}/page/{id}")
     * @ParamConverter("page")
     * @SeoPageData()
     */
    public function scalarSeoDataAwareAction($index, SeoDataAware $page)
    {
        return $this->seoDataAwareAction($page);
    }

    /**
     * @Route("/seo-aware/page/{page_id}/article/{article_id}")
     * @ParamConverter("page", options={"id": "page_id"})
     * @ParamConverter("article", options={"id": "article_id"})
     * @SeoPageData()
     * @param SeoDataAware $page
     * @param Article $article
     * @return Response
     */
    public function seoDataAwareAndArticleAction(SeoDataAware $page, Article $article)
    {
        return $this->seoDataAwareAction($page);
    }

    /**
     * @Route("/seo-aware/article/{article_id}/page/{page_id}")
     * @ParamConverter("page", options={"id": "page_id"})
     * @ParamConverter("article", options={"id": "article_id"})
     * @SeoPageData()
     * @param SeoDataAware $page
     * @param Article $article
     * @return Response
     */
    public function articleAndSeoDataAwareAction(Article $article, SeoDataAware $page)
    {
        return $this->seoDataAwareAction($page);
    }
}
