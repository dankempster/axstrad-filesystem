<?php
namespace Axstrad\Symfony\EventDispatcher\Tests;

use Axstrad\Component\Test\TraitTestCase;


/**
 * Axstrad\Symfony\EventDispatcher\Tests\EventDispatcherAwareTraitTest
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
