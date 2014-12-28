<?php
namespace Axstrad\Component\Filesystem\Tests\Functional\FileBag;

use Axstrad\Component\Filesystem\FileBag\SplFileInfoBag;
use Axstrad\Component\Test\TestCase;


/**
 * @group unit
 * @uses Axstrad\Component\Filesystem\FileBag\BaseBag
 */
class SplFileInfoBagTest extends TestCase
{
    public function setUp()
    {
        $this->fixture = new SplFileInfoBag;
    }

    /**
     * @covers Axstrad\Component\Filesystem\FileBag\SplFileInfoBag::add
     * @expectedException Axstrad\Component\Filesystem\Exception\InvalidArgumentException
     */
    public function testCanNotAddFileObject()
    {
        $this->fixture->add($this->getMockForAbstractClass('Axstrad\Component\Filesystem\File'));
    }
}
