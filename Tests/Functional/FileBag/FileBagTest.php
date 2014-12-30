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

use Axstrad\Component\Filesystem\FileBag\FileBag;
use Axstrad\Component\Test\TestCase;


/**
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @group unit
 * @uses Axstrad\Component\Filesystem\FileBag\BaseBag
 */
class FileBagTest extends TestCase
{
    public function setUp()
    {
        $this->fixture = new FileBag;
    }

    /**
     * @expectedException Axstrad\Component\Filesystem\Exception\InvalidArgumentException
     */
    public function testCanNotAddSplFileInfo()
    {
        $this->fixture->add(new \SplFileInfo(__DIR__.'/../../_assers/a-file.txt'));
    }
}
