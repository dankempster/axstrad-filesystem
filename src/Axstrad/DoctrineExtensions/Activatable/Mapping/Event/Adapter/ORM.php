<?php
/**
 * This file is part of the Axstrad library.
 *
 * (c) Dan Kempster <dev@dankempster.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @package Axstrad\DoctineExtensions
 */
namespace Axstrad\DoctrineExtensions\Activatable\Mapping\Event\Adapter;

use Axstrad\DoctrineExtensions\Activatable\Mapping\Event\ActivatableAdapter;
use Axstrad\DoctrineExtensions\Exception\InvalidArgumentException;
use Gedmo\Mapping\Event\Adapter\ORM as BaseAdapterORM;


/**
 * Axstrad\DoctrineExtensions\Activatable\Mapping\Event\Adapter\ORM
 *
 * Doctrine event adapter for ORM adapted for Activatable behavior.
 */
final class ORM extends BaseAdapterORM implements ActivatableAdapter
{
}
