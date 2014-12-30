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

namespace Axstrad\Component\Filesystem\Tests\Functional\FileBag;

use Axstrad\Component\Filesystem\FileBag\SplFileInfoBag;
use Axstrad\Component\Test\TestCase;


/**
 * @author Dan Kempster <dev@dankempster.co.uk>
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
