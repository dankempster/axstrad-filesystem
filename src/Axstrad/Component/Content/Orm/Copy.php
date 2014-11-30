<?php
namespace Axstrad\Component\Content\Orm;

use Axstrad\Component\Content\Traits\Copy as CopyTrait;
use Axstrad\Component\DoctrineOrm\Entity\BaseEntity;


/**
 * Axstrad\Component\Content\Orm\Copy
 */
abstract class Copy extends BaseEntity
{
    use CopyTrait;
}
