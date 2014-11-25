<?php
namespace Axstrad\Component\Content\Model;

use Axstrad\Component\Content\Copy as CopyInterface;
use Axstrad\Component\Content\Traits\Copy as CopyTrait;


/**
 * Axstrad\Component\Content\Model\Copy
 */
abstract class Copy implements
    CopyInterface
{
    use CopyTrait;
}
