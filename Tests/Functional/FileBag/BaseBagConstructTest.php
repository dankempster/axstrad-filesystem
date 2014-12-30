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

use Axstrad\Component\Filesystem\FileBag\BaseBag;
use Axstrad\Component\Filesystem\Tests\TestCase;


/**
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @group unit
 * @uses Axstrad\Component\Filesystem\FileBag\BaseBag::add
 */
class BaseBagConstructionTest extends TestCase
{
    /**
     * @covers Axstrad\Component\Filesystem\FileBag\BaseBag::__construct
     * @dataProvider canAddFileCollectionsDataProvider
     * @depends Axstrad\Component\Filesystem\Tests\Functional\FileBag\BaseBagAddTest::testCanAddFileCollections
     */
    public function testCanConstructWithFileCollections($fileStubs)
    {
        $this->fixture = new BaseBag($fileStubs);

        foreach ($fileStubs as $fileStub) {
            $this->assertAttributeContains(
                $fileStub,
                'files',
                $this->fixture
            );
        }
    }

    /**
     * @uses getFileStubs To get the files to use for the various collections.
     */
    public function canAddFileCollectionsDataProvider()
    {
        $files = array(
            $this->createSplFileInfo(),
            $this->createFileStub(),
        );

        $iterator = new \ArrayIterator($files);

        $mockBag = $this->getMockForAbstractClass('Axstrad\Component\Filesystem\FileBag');
        $mockBag->expects($this->any())
            ->method('getIterator')
            ->will($this->returnValue($iterator))
        ;

        return array(
            [$files],
            [$iterator],
            [$mockBag],
        );
    }
}
