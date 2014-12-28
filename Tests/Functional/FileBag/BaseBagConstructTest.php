<?php
namespace Axstrad\Component\Filesystem\Tests\Functional\FileBag;

use Axstrad\Component\Filesystem\FileBag\BaseBag;


/**
 * @group functional
 */
class BaseBagConstructionTest extends TestCase
{
    protected $fixtureClass = 'Axstrad\Component\Filesystem\FileBag\BaseBag';


    /**
     * @dataProvider canAddFileCollectionsDataProvider
     * @depends Axstrad\Component\Filesystem\Tests\Functional\FileBag\BaseBagAddTest::testCanAddFileCollections
     */
    public function testCanConstructWithFileCollections($fileStubs)
    {
        $classNamne = $this->fixtureClass;
        $this->fixture = new $classNamne($fileStubs);

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
        $files = $this->getFileStubs();

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

    protected function getFileStubs()
    {
        return array(
            new \SplFileInfo(__DIR__.'/../../_asset/file.txt'),
            $this->getMockForAbstractClass('Axstrad\Component\Filesystem\File'),
        );
    }
}
