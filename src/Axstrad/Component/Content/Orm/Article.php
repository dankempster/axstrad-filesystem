<?php
namespace Axstrad\Component\Content\Orm;

use Axstrad\Component\Content\Traits\Article as ArticleTrait;
use Axstrad\Component\DoctrineOrm\Entity\BaseEntity;

/**
 * Axstrad\Component\Content\Orm\Article
 */
abstract class Article extends BaseEntity
{
    use ArticleTrait;
}
