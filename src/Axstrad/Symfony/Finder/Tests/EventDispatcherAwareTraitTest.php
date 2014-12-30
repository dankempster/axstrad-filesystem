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

namespace Axstrad\Symfony\Finder\Tests;

use Axstrad\Component\Test\TestCase;


/**
 * Axstrad\Symfony\Finder\Tests\FinderAwareTraitTest
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @package Axstrad\Symfony
 * @subpackage Finder\Tests
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
