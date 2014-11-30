<?php
namespace Axstrad\Bundle\SeoBundle\EventListener;

use Axstrad\Bundle\SeoBundle\Configuration\SeoPageData;
use Symfony\Cmf\Bundle\SeoBundle\SeoPresentationInterface as SeoPresentation;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;


/**
 * Handles the @SeoPageData annotation
 *
 * Axstrad\Bundle\SeoBundle\EventListener\SeoPageDataListener
 */
class SeoPageDataListener implements EventSubscriberInterface
{
    /**
     * @var SeoPresentation
     */
    protected $presentation;

    /**
     * @param SeoPresentation $presentation
     */
    public function __construct(SeoPresentation $presentation)
    {
        $this->presentation = $presentation;
    }

    /**
     * @param  FilterControllerEvent $event
     * @return void
     * @uses identifySeoDataObject
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        $request = $event->getRequest();

        // Load configuration
        $configuration = $request->attributes->get('_seoPageData');
        if (!$configuration instanceof SeoPageData) {
            return;
        }

        // If a parameter name isn't set, try and identify it.
        if ($configuration->name === null) {
            $this->identifySeoDataObject(
                $configuration,
                $event->getController(),
                $request
            );
        }

        // Update SEO presentation from configured parameter, assuming it
        // exits
        if ($configuration->name !== null &&
            $request->attributes->has($configuration->name)
        ) {
            $this->presentation->updateSeoPage(
                $request->attributes->get($configuration->name)
            );
        }
    }

    /**
     * @param  SeoPageData $configuration
     * @param  object $controller
     * @param  Request $request
     * @return void
     */
    protected function identifySeoDataObject($configuration, $controller, $request)
    {
        if (is_array($controller)) {
            $r = new \ReflectionMethod($controller[0], $controller[1]);
        } else {
            $r = new \ReflectionFunction($controller);
        }

        foreach ($r->getParameters() as $param) {
            if (!$param->getClass() || $param->getClass()->isInstance($request)) {
                continue;
            }

            $pr = $param->getClass();
            if ($pr->isSubclassOf('Symfony\Cmf\Bundle\SeoBundle\SeoAwareInterface')
                || $pr->isSubclassOf('Symfony\Cmf\Bundle\SeoBundle\Model\SeoMetadataInterface')
            ) {
                $configuration->name = $param->getName();
                return;
            }
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::CONTROLLER => 'onKernelController',
        );
    }
}
