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
        $this->fixture = $this->getMockForTrait('Axstrad\Component\Content\Traits\Copy', array('My copy.'));
    }

    /**
     * @covers Axstrad\Component\Content\Traits\Copy::__construct
     * @covers Axstrad\Component\Content\Traits\Copy::getCopy
     */
    public function testConstructorSetsCopy()
    {
        $this->assertEquals(
            'My copy.',
            $this->fixture->getCopy()
        );
    }

    /**
     * @covers Axstrad\Component\Content\Traits\Copy::setCopy
     * @depends testConstructorSetsCopy
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
     * @covers Axstrad\Component\Content\Traits\Copy::setCopy
     * @depends testConstructorSetsCopy
     */
    public function testSetCopyReturnsSelf()
    {
        $this->assertSame(
            $this->fixture,
            $this->fixture->setCopy('foo')
        );
    }

    /**
     * @covers Axstrad\Component\Content\Traits\Copy::setCopy
     * @depends testConstructorSetsCopy
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
