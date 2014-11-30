<?php
namespace Axstrad\Component\Content\Tests\Content\Traits;

use Axstrad\Component\Test\TestCase;


/**
 * Axstrad\Component\Content\Tests\Content\Traits\CopyTest
 *
 * @group unittests
 * @uses Axstrad\Component\Content\Traits\Copy
 */
class CopyTest extends TestCase
{
    public function setUp()
    {
        $this->fixture = $this->getMockForTrait('Axstrad\Component\Content\Traits\Copy');
    }

    /**
     * covers Axstrad\Component\Content\Traits\Copy::getCopy
     * covers Axstrad\Component\Content\Traits\Copy::setCopy
     */
    public function testCanSetCopy()
    {
        $this->fixture->setCopy('Some more copy.');
        $this->assertEquals(
            'Some more copy.',
            $this->fixture->getCopy()
        );
    }

    /**
     * covers Axstrad\Component\Content\Traits\Copy::setCopy
     */
    public function testSetCopyReturnsSelf()
    {
        $this->assertSame(
            $this->fixture,
            $this->fixture->setCopy('foo')
        );
    }

    /**
     * covers Axstrad\Component\Content\Traits\Copy::setCopy
     * @depends testCanSetCopy
     */
    public function testCopyIsTypeCastToString()
    {
        $this->fixture->setCopy(1.1);
        $this->assertSame(
            '1.1',
            $this->fixture->getCopy()
        );
    }
}
