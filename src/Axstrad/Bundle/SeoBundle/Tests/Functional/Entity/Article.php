<?php
namespace Axstrad\Bundle\SeoBundle\Tests\Functional\Entity;

use Axstrad\Component\Content\Orm\Article as BaseArticle;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Cmf\Bundle\SeoBundle\SeoAwareInterface;
use Symfony\Cmf\Bundle\SeoBundle\SeoAwareTrait;

new ORM\Entity;

/**
 * Axstrad\Bundle\SeoBundle\Tests\Functonal\Entity\Article
 *
 * @ORM\Entity
 */
class Article extends BaseArticle
{

}
