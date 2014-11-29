<?php
namespace Axstrad\Component\Page;

use Axstrad\Component\Content\Article;
use Axstrad\DoctrineExtensions\Sluggable\Sluggable;
use Symfony\Cmf\Bundle\SeoBundle\SeoAwareInterface;


/**
 * Axstrad\Component\Page\Page
 */
interface Page extends
    Article,
    SeoAwareInterface,
    Sluggable
{

}
