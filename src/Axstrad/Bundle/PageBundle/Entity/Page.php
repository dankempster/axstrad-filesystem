<?php
namespace Axstrad\Bundle\PageBundle\Entity;

use Axstrad\Component\Content\Orm\Article;
use Axstrad\DoctrineExtensions\Activatable\ActivatableTrait;
use Axstrad\DoctrineExtensions\Sluggable\SluggableTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Cmf\Bundle\SeoBundle\SeoAwareInterface;
use Symfony\Cmf\Bundle\SeoBundle\SeoAwareTrait;


/**
 * Axstrad\Bundle\PageBundle\Entity\Page
 */
class Page extends Article implements
    SeoAwareInterface
{
    use ActivatableTrait;
    use SeoAwareTrait;
    use SluggableTrait;
}
