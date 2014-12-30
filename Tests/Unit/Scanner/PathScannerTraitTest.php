<?php
/**
 * This file is part of the Axstrad library.
 *
 * (c) Dan Kempster <dev@dankempster.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright 2014-2015 Dan Kempster <dev@dankempster.co.uk>
 */

namespace Axstrad\Component\Filesystem\Tests\Unit\Scanner;

use Axstrad\Component\Test\TraitTestCase;


/**
 * Axstrad\Component\Filesystem\Tests\Unit\Scanner\PathScannerTraitTest
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
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
