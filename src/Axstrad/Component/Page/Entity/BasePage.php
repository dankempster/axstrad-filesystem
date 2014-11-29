<?php
namespace Axstrad\Component\Page\Entity;

use Axstrad\Component\Content\Orm\Article as BaseArticle;
use Axstrad\Component\Page\Page;
use Axstrad\DoctrineExtensions\Sluggable\SluggableTrait;
use Symfony\Cmf\Bundle\SeoBundle\SeoAwareTrait;


/**
 * Axstrad\Component\Page\Entity\BasePage
 */
abstract class BasePage extends BaseArticle implements
    Page
{
    use SeoAwareTrait;
    use SluggableTrait;
}
