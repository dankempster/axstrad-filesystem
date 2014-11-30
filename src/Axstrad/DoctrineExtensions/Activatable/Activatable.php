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
namespace Axstrad\DoctrineExtensions\Activatable;


/**
 * Axstrad\DoctrineExtensions\Activatable\Activatable
 *
 * It is not neccassry to implement this interface, but can be implemented for Domain Objects which in some cases needs
 * to be identified as Activatable.
 */
interface Activatable
{
    /**
     * @axstrad:Activatable
     * to mark the class as Activatable use class annotation @axstrad:Activatable
     * example:
     *
     * @axstrad:Activatable
     * class MyEntity
     */


    /**
     * Get active
     *
     * @return boolean
     */
    public function isActive();

    /**
     * Set active
     *
     * @param  boolean $active=true
     * @return Activatable Returns self for fluent interface
     */
    public function setActive($active=true);
}
