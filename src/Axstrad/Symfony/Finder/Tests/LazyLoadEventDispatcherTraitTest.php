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
 * Axstrad\Symfony\Finder\Tests\LazyLoadFinderTraitTest
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @package Axstrad\Symfony
 * @subpackage Finder\Tests
 */
class LazyLoadFinderTraitTest extends TestCase
{
    public function setUp()
    {
        $this->fixture = $this->getMockForTrait('Axstrad\Symfony\Finder\LazyLoadFinderTrait');
    }

    /**
     * @covers Axstrad\Symfony\Finder\LazyLoadFinderTrait::getFinder
     */
    public function testExtendDispatcherIsLazyLoaded()
    {
        $this->assertInstanceOf(
            'Symfony\Component\Finder\Finder',
            $this->fixture->getFinder()
        );
    }
}
