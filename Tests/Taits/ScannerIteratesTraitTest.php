<?php
namespace Axstrad\Component\Filesystem\Tests\Traits;

use Axstrad\Component\Test\TraitTestCase;


/**
 * Axstrad\Component\Filesystem\Tests\Traits\ScannerIteratesTraitTest
 *
 * @group unittest
 */
class ScannerIteratesTraitTest extends TraitTestCase
{
    public function setUp()
    {
        $this->fixture = $this->getMockForTrait('Axstrad\Component\Filesystem\Traits\ScannerIteratesTrait');
    }

    /**
     * @covers Axstrad\Component\Filesystem\Traits\ScannerIteratesTrait::setIterator
     */
    public function testSetIteratorAcceptsDirectoryIterator()
    {
        $this->fixture->setIterator(new \DirectoryIterator(sys_get_temp_dir()));
    }

    /**
     * @covers Axstrad\Component\Filesystem\Traits\ScannerIteratesTrait::setIterator
     * @depends testSetIteratorAcceptsDirectoryIterator
     */
    public function testSetIteratorAcceptsOuterIterator()
    {
        $this->fixture->setIterator($this->getMockForAbstractClass('OuterIterator'));
    }

    /**
     * @covers Axstrad\Component\Filesystem\Traits\ScannerIteratesTrait::setIterator
     * @depends testSetIteratorAcceptsOuterIterator
     * @expectedException Axstrad\Component\Filesystem\Exception\InvalidArgumentException
     */
    public function testSetIteratorThrowsException1()
    {
        $this->fixture->setIterator($this->getMockForAbstractClass('Iterator'));
    }
}
