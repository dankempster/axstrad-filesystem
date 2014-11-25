<?php
namespace Axstrad\Bundle\PageBundle\Entity;

use Axstrad\Component\Content\Orm\Article;
use Axstrad\DoctrineExtensions\Activatable\ActivatableTrait;
use Axstrad\DoctrineExtensions\Sluggable\SluggableTrait;

/**
 * Axstrad\Bundle\PageBundle\Entity\Page
 */
class Page extends Article
{
    use ActivatableTrait;
    use SluggableTrait;
}
