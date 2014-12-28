<?php
namespace Axstrad\Component\Filesystem\Tests\Functional\FileBag;


/**
 * @group functional
 */
class BaseBagAddTest extends TestCase
{
    protected $fixtureClass = 'Axstrad\Component\Filesystem\FileBag\BaseBag';


    /**
     * @dataProvider addFileDataProvider
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
                new \SplFileInfo(__DIR__.'/../_asset/file.txt'),
            ),
            array(
                $this->getMockForAbstractClass('Axstrad\Component\Filesystem\File'),
            ),
        );
    }

    /**
     * @dataProvider canAddFileCollectionsDataProvider
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
            new \SplFileInfo(__DIR__.'/../_asset/file.txt'),
            $this->getMockForAbstractClass('Axstrad\Component\Filesystem\File'),
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

    public function testIsEmptyWhenEmpty()
    {
        $this->assertTrue($this->fixture->isEmpty());
    }

    public function testIsNotEmptyWhenEmpty()
    {
        $this->fixture->clear();
        $this->assertFalse($this->fixture->isNotEmpty());
    }
}
