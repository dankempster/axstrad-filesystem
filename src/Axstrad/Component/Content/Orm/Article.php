<?php
namespace Axstrad\Component\Content\Orm;

use Axstrad\Component\Content\Model\Article as BaseArticle;
use Axstrad\Component\DoctrineOrm\Entity\IntegerIdTrait;

/**
 * Axstrad\Component\Content\Orm\Article
 */
abstract class Article extends BaseArticle
{
    use IntegerIdTrait;
}
