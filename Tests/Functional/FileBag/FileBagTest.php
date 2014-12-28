<?php
namespace Axstrad\Component\Filesystem\Tests\Functional\FileBag;

use Axstrad\Component\Filesystem\FileBag\FileBag;
use Axstrad\Component\Test\TestCase;


/**
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
