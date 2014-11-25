<?php
namespace Axstrad\Component\Content\Model;

use Axstrad\Component\Content\Article as ArticleInterface;
use Axstrad\Component\Content\Traits\Article as ArticleTrait;


/**
 * Axstrad\Component\Content\Model\Article
 */
abstract class Article implements
    ArticleInterface
{
    use ArticleTrait;
}
