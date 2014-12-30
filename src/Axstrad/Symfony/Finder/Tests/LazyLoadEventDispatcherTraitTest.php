<?php
namespace Axstrad\Symfony\Finder\Tests;

use Axstrad\Component\Test\TestCase;


/**
 * Axstrad\Symfony\Finder\Tests\LazyLoadFinderTraitTest
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
