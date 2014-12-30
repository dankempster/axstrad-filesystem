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
 * @group unit
 * @uses Axstrad\Component\Filesystem\FileBag\BaseBag::__construct
 * @author Dan Kempster <dev@dankempster.co.uk>
 */
class BaseBagAddTest extends TestCase
{
    public function setUp()
    {
        $this->fixture = new BaseBag;
    }


    /**
     * @dataProvider addFileDataProvider
     * @covers Axstrad\Component\Filesystem\FileBag\BaseBag::add
     */
    public function testCanAddFileObjects($fileStub)
    {
        $this->fixture->add($fileStub);

        $this->assertAttributeContains(
            $fileStub,
            'files',
            $this->fixture
        );
    }

    public function addFileDataProvider()
    {
        return array(
            array(
                $this->createSplFileInfo(),
            ),
            array(
                $this->createFileStub()
            ),
        );
    }

    /**
     * @dataProvider canAddFileCollectionsDataProvider
     * @covers Axstrad\Component\Filesystem\FileBag\BaseBag::add
     */
    public function testCanAddFileCollections($fileStubs)
    {
        $this->fixture->add($fileStubs);

        foreach ($fileStubs as $fileStub) {
            $this->assertAttributeContains(
                $fileStub,
                'files',
                $this->fixture
            );
        }
    }

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

    /**
     * @dataProvider addDataProvider
     * @covers Axstrad\Component\Filesystem\FileBag\BaseBag::add
     */
    public function testAddAlwaysReturnsTrue($fileStub)
    {
        $this->assertTrue(
            $this->fixture->add($fileStub)
        );
    }

    public function addDataProvider()
    {
        return array_merge(
            $this->addFileDataProvider(),
            $this->canAddFileCollectionsDataProvider()
        );
    }

    /**
     * @covers Axstrad\Component\Filesystem\FileBag\BaseBag::isEmpty
     */
    public function testIsEmptyWhenEmpty()
    {
        $this->assertTrue($this->fixture->isEmpty());
    }

    /**
     * @covers Axstrad\Component\Filesystem\FileBag\BaseBag::isNotEmpty
     */
    public function testIsNotEmptyWhenEmpty()
    {
        $this->fixture->clear();
        $this->assertFalse($this->fixture->isNotEmpty());
    }
}
