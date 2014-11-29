<?php

namespace Axstrad\Bundle\PageBundle\Tests\Functional\Controller;

use Axstrad\Bundle\SeoBundle\Configuration\SeoPageData;
use Axstrad\Bundle\PageBundle\Tests\Functional\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Cmf\Bundle\SeoBundle\Model\SeoMetadata;
use Symfony\Component\HttpFoundation\Response;

new ParamConverter(array());
new SeoPageData(array());


/**
 * Axstrad\Bundle\PageBundle\Tests\Functional\Controller\EventController
 *
 * A controller to test that AxstradPageBundle:Page entity can be extended and
 * resused with esae.
 */
class EventController extends Controller
{
    /**
     * @ParamConverter("event")
     * @SeoPageData()
     */
    public function indexAction(Event $event)
    {
        return new Response(
            $this->renderView(
                'AxstradPageBundle:Default:index.html.twig',
                array(
                    'page' => $event,
                )
            )
        );
    }
}
