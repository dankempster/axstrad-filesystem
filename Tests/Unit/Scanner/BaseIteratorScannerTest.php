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

use Axstrad\Component\Filesystem\Scanner\BaseIteratorScanner;
use Axstrad\Component\Test\TestCase;


/**
 * @author Dan Kempster <dev@dankempster.co.uk>
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
