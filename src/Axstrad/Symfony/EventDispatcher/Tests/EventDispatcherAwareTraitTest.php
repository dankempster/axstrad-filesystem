<?php
/**
 * This file is part of the Axstrad library.
 *
 * (c) Dan Kempster <dev@dankempster.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright 2014-2015 Dan Kempster <dev@dankempster.co.uk>
 */

namespace Axstrad\Symfony\EventDispatcher\Tests;

use Axstrad\Component\Test\TraitTestCase;


/**
 * Axstrad\Symfony\EventDispatcher\Tests\EventDispatcherAwareTraitTest
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @package Axstrad\Symfony
 * @subpackage EventDispatcher\Tests
 */
class EventDispatcherAwareTraitTest extends TraitTestCase
{
    protected $trait = 'Axstrad\Symfony\EventDispatcher\EventDispatcherAwareTrait';


    /**
     * @covers Axstrad\Symfony\EventDispatcher\EventDispatcherAwareTrait::getEventDispatcher
     */
    public function testExtendDispatcherIsNullToStartWith()
    {
        $this->assertNull($this->fixture->getEventDispatcher());
    }

    /**
     * @covers Axstrad\Symfony\EventDispatcher\EventDispatcherAwareTrait::setEventDispatcher
     * @covers Axstrad\Symfony\EventDispatcher\EventDispatcherAwareTrait::getEventDispatcher
     */
    public function testSetEventDispatcher()
    {
        $mockDispacther = $this->getMock('Symfony\Component\EventDispatcher\EventDispatcher');
        $this->fixture->setEventDispatcher($mockDispacther);
        $this->assertSame(
            $mockDispacther,
            $this->fixture->getEventDispatcher()
        );
    }

    /**
     * @covers Axstrad\Symfony\EventDispatcher\EventDispatcherAwareTrait::setEventDispatcher
     */
    public function testSetEventDispatcherReturnsSelf()
    {
        $mockDispacther = $this->getMock('Symfony\Component\EventDispatcher\EventDispatcher');
        $this->assertSame(
            $this->fixture,
            $this->fixture->setEventDispatcher($mockDispacther)
        );
    }
}
