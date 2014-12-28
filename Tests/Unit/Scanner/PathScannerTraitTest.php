<?php
namespace Axstrad\Component\Filesystem\Tests\Unit\Scanner;

use Axstrad\Component\Test\TraitTestCase;


/**
 * Axstrad\Component\Filesystem\Tests\Unit\Scanner\PathScannerTraitTest
 *
 * @group unit
 */
class PathScannerTraitTest extends TraitTestCase
{
    use \Axstrad\Component\Filesystem\Scanner\PathScannerTrait;


    public function setUp() { }

    /**
     * @covers Axstrad\Component\Filesystem\Scanner\PathScannerTrait::throwExceptionIfPathNotExist
     * @expectedException Axstrad\Component\Filesystem\Exception\InvalidPathException
     */
    public function testSetIteratorAcceptsDirectoryIterator()
    {
        $this->throwExceptionIfPathNotExist();
    }
}
