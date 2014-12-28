<?php
namespace Axstrad\Component\Filesystem\Tests\Unit\Scanner;

use Axstrad\Component\Filesystem\Scanner\BaseIteratorScanner;
use Axstrad\Component\Test\TestCase;


/**
 * @group unit
 */
class BaseIteratorScannerTest extends TestCase
{
    public function setUp()
    {
        $this->fixture = new BaseIteratorScanner;
    }

    /**
     * @covers Axstrad\Component\Filesystem\Scanner\BaseIteratorScanner::setFileClassname
     * @expectedException Axstrad\Component\Filesystem\Exception\ClassDoesNotExistException
     */
    public function testSetFileClassnameThrowsException()
    {
        $this->fixture->setFileClassname('Foo');
    }

    /**
     * @covers Axstrad\Component\Filesystem\Scanner\BaseIteratorScanner::setFileClassname
     * @uses Axstrad\Component\Filesystem\Scanner\BaseIteratorScanner::getFileClassname
     */
    public function testCanSetFileClassnameToNull()
    {
        $this->fixture->setFileClassname('SplFileInfo');
        $this->fixture->setFileClassname(null);
        $this->assertNull(
            $this->fixture->getFileClassname()
        );
    }
}
