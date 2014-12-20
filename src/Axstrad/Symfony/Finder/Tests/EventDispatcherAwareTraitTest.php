<?php
namespace Axstrad\Symfony\Finder\Tests;

use Axstrad\Component\Test\TestCase;


/**
 * Axstrad\Symfony\Finder\Tests\FinderAwareTraitTest
 */
class FinderAwareTraitTest extends TestCase
{
    public function setUp()
    {
        $this->fixture = $this->getMockForTrait('Axstrad\Symfony\Finder\FinderAwareTrait');
    }

    /**
     * @covers Axstrad\Symfony\Finder\FinderAwareTrait::getFinder
     */
    public function testExtendDispatcherIsNullToStartWith()
    {
        $this->assertNull($this->fixture->getFinder());
    }

    /**
     * @covers Axstrad\Symfony\Finder\FinderAwareTrait::setFinder
     * @covers Axstrad\Symfony\Finder\FinderAwareTrait::getFinder
     */
    public function testSetFinder()
    {
        $mockDispacther = $this
            ->getMockBuilder('Symfony\Component\Finder\Finder')
            ->disableOriginalConstructor()
            ->getMock()
        ;
        $this->fixture->setFinder($mockDispacther);
        $this->assertSame(
            $mockDispacther,
            $this->fixture->getFinder()
        );
    }

    /**
     * @covers Axstrad\Symfony\Finder\FinderAwareTrait::setFinder
     */
    public function testSetFinderReturnsSelf()
    {
        $mockDispacther = $this
            ->getMockBuilder('Symfony\Component\Finder\Finder')
            ->disableOriginalConstructor()
            ->getMock()
        ;
        $this->assertSame(
            $this->fixture,
            $this->fixture->setFinder($mockDispacther)
        );
    }
}
