<?php
namespace Axstrad\Component\Content\Tests\Traits;

use Axstrad\Component\Test\TestCase;


/**
 * Axstrad\Component\Content\Tests\Traits\ArticleTest
 *
 * @group unittests
 * @uses Axstrad\Component\Content\Traits\Article
 * @uses Axstrad\Component\Content\Traits\Copy
 */
class ArticleTest extends TestCase
{
    public function setUp()
    {
        $this->fixture = $this->getMockForTrait('Axstrad\Component\Content\Traits\Article');
    }

    /**
     * @covers Axstrad\Component\Content\Traits\Article::getHeading
     * @covers Axstrad\Component\Content\Traits\Article::setHeading
     */
    public function testCanSetHeading()
    {
        $this->fixture->setHeading('A New Heading.');
        $this->assertEquals(
            'A New Heading.',
            $this->fixture->getHeading()
        );
    }

    /**
     * @covers Axstrad\Component\Content\Traits\Article::setHeading
     */
    public function testSetHeadingReturnsSelf()
    {
        $this->assertSame(
            $this->fixture,
            $this->fixture->setHeading('')
        );
    }

    /**
     * @covers Axstrad\Component\Content\Traits\Article::getCopy
     * @covers Axstrad\Component\Content\Traits\Article::setCopy
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
     * @covers Axstrad\Component\Content\Traits\Article::setCopy
     */
    public function testSetCopyReturnsSelf()
    {
        $this->assertSame(
            $this->fixture,
            $this->fixture->setCopy('')
        );
    }

    /**
     * @covers Axstrad\Component\Content\Traits\Article::setCopy
     * @uses Axstrad\Component\Content\Traits\Article::getCopy
     */
    public function testCopyIsTypeCastToString()
    {
        $this->fixture->setCopy(1.1);
        $this->assertEquals(
            '1.1',
            $this->fixture->getCopy()
        );
    }

    /**
     * @covers Axstrad\Component\Content\Traits\Article::setCopy
     * @uses Axstrad\Component\Content\Traits\Article::getCopy
     */
    public function testCanSetCopyToNull()
    {
        $this->fixture->setCopy(null);
        $this->assertNull($this->fixture->getCopy());
    }
}
