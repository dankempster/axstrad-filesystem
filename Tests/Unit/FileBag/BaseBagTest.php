<?php
namespace Axstrad\Component\Filesystem\Tests\Unit\FileBag;

use Axstrad\Component\Filesystem\Tests\TestCase;
use Axstrad\Component\Filesystem\FileBag\BaseBag;


/**
 * @group unit
 * @uses Axstrad\Component\Filesystem\FileBag\BaseBag::__construct
 * @uses Axstrad\Component\Filesystem\FileBag\BaseBag::add
 */
class BaseBagTest extends TestCase
{
    public function setUp()
    {
        $this->fileStubs = array(
            $this->createSplFileInfo(),
            $this->createFileStub()
        );

        $this->fixture = new BaseBag($this->fileStubs);
    }

    /**
     * @covers Axstrad\Component\Filesystem\FileBag\BaseBag::remove
     * @dataProvider methodThrowsExceptionDataProvider
     */
    public function testRemoveMethodThrowsException($expectedException, $argument)
    {
        $this->setExpectedException($expectedException);
        $this->fixture->remove($argument);
    }

    /**
     * @covers Axstrad\Component\Filesystem\FileBag\BaseBag::has
     * @dataProvider methodThrowsExceptionDataProvider
     */
    public function testHasMethodThrowsException($expectedException, $argument)
    {
        $this->setExpectedException($expectedException);
        $this->fixture->has($argument);
    }

    public function methodThrowsExceptionDataProvider()
    {
        return array(
            array(
                'Axstrad\Component\Filesystem\Exception\InvalidArgumentException',
                'foo'
            ),
            array(
                'Axstrad\Component\Filesystem\Exception\UnexpectedValueException',
                array('foo'),
            ),
            array(
                'Axstrad\Component\Filesystem\Exception\UnexpectedValueException',
                array(array('foo')),
            ),
        );
    }
}