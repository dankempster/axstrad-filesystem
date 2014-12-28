<?php
namespace Axstrad\Component\Filesystem\Tests\Unit\FileBag;

use Axstrad\Component\Test\TraitTestCase;
use Axstrad\Component\Filesystem\FileBag\BaseBag;


/**
 * @group unit
 * @uses Axstrad\Component\Filesystem\FileBag\BaseBag::__construct
 */
class BaseBagAddTest extends TraitTestCase
{
    public function setUp()
    {
        $this->fixture = new BaseBag;
    }

    /**
     * @covers Axstrad\Component\Filesystem\FileBag\BaseBag::add
     * @dataProvider addMethodThrowsExceptionDataProvider
     */
    public function testAddMethodThrowsException($expectedException, $argument)
    {
        $this->setExpectedException($expectedException);
        $this->fixture->add($argument);
    }

    public function addMethodThrowsExceptionDataProvider()
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
