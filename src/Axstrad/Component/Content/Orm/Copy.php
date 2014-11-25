<?php
namespace Axstrad\Component\Content\Orm;

use Axstrad\Component\Content\Model\Copy as BaseCopy;
use Axstrad\Component\DoctrineOrm\Entity;
use Axstrad\Component\DoctrineOrm\Entity\IntegerIdTrait;


/**
 * Axstrad\Component\Content\Orm\Copy
 */
abstract class Copy extends BaseCopy implements
    Entity
{
    use IntegerIdTrait;
}
