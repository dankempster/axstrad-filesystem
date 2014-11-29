<?php
namespace Axstrad\Bundle\PageBundle\Entity;

use Axstrad\Component\Page\Entity\BasePage;
use Axstrad\DoctrineExtensions\Activatable\ActivatableTrait;
use Axstrad\DoctrineExtensions\Sluggable\SluggableTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Cmf\Bundle\SeoBundle\SeoAwareInterface;
use Symfony\Cmf\Bundle\SeoBundle\SeoAwareTrait;


/**
 * Axstrad\Bundle\PageBundle\Entity\Page
 */
class Page extends BasePage
{
    use ActivatableTrait;
}

