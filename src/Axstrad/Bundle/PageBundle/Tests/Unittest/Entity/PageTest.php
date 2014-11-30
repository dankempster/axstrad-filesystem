<?php
namespace Axstrad\Bundle\PageBundle\Tests\Unittest\Entity;

use Axstrad\Bundle\PageBundle\Entity\Page;


class PageTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->fixture = new Page;
    }

    public function testHeading()
    {
        $this->assertSame(
            $this->fixture,
            $this->fixture->setHeading('heading'),
            'setHeading() doesn\'t return self.'
        );

        $this->assertEquals(
            'heading',
            $this->fixture->getHeading()
        );
    }

    public function testCopy()
    {
        $this->assertSame(
            $this->fixture,
            $this->fixture->setCopy('copy'),
            'setCopy() doesn\'t return self.'
        );

        $this->assertEquals(
            'copy',
            $this->fixture->getCopy()
        );
    }
}
