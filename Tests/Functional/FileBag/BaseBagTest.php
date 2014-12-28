<?php
namespace Axstrad\Component\Filesystem\Tests\Functional\FileBag;

use ArrayIterator;
use Axstrad\Component\Test\TraitTestCase;
use Axstrad\Component\Filesystem\FileBag\BaseBag;


/**
 * @group functional
 * @depends Axstrad\Component\Filesystem\Tests\Functional\FileBag\BaseBagConstructionTest::testCanConstructWithFileCollections
 */
class BaseBagTest extends TraitTestCase
{
    protected $fixtureClass = 'Axstrad\Component\Filesystem\FileBag\BaseBag';

    protected $fileStubs = array();


    /**
     * @uses getFileStubs
     */
    public function setUp()
    {
        $this->fileStubs = $this->getFileStubs();

        $className = $this->fixtureClass;
        $this->fixture = new $className($this->fileStubs);
    }

    protected function getFileStubs()
    {
        return array(
            new \SplFileInfo(__DIR__.'/../../_assers/a-file.txt'),
            $this->getMockForAbstractClass('Axstrad\Component\Filesystem\File'),
            $this->getMockForAbstractClass('Axstrad\Component\Filesystem\File'),
        );
    }

    protected function createFileStub()
    {
        return $this->getMockForAbstractClass('Axstrad\Component\Filesystem\File');
    }

    /**
     * @dataProvider removeFileDataProvider
     */
    public function testRemoveFile($fileStub)
    {
        if (is_integer($fileStub)) {
            $fileStub = $this->fileStubs[$fileStub];
        }

        $this->fixture->remove($fileStub);

        $this->assertAttributeNotContains(
            $fileStub,
            'files',
            $this->fixture
        );
    }

    public function removeFileDataProvider()
    {
        return array(
            [0],
            [2],
        );
    }

    /**
     * @dataProvider removeFileReturnsBooleanDataProvider
     */
    public function testRemoveFileReturnsBoolean($fileStub, $expectedReturn)
    {
        if (is_integer($fileStub)) {
            $fileStub = $this->fileStubs[$fileStub];
        }

        $this->assertEquals(
            $this->fixture->remove($fileStub),
            $expectedReturn
        );
    }

    public function removeFileReturnsBooleanDataProvider()
    {
        return array(
            array(
                0,
                true
            ),
            array(
                $this->createFileStub(),
                false,
            ),
        );
    }

    /**
     * @dataProvider removeFileDataProviderWithCollectionDataProvider
     */
    public function testRemoveFileWithCollections($fileStubs, $type)
    {
        foreach ($fileStubs as &$value) {
            if (is_integer($value)) {
                $value = $this->fileStubs[$value];
            }
        }

        if ($type === 'ArrayIterator') {
            $fileStubs = new ArrayIterator($fileStubs);
        }

        $this->fixture->remove($fileStubs);

        foreach ($fileStubs as $fileStub) {
            $this->assertAttributeNotContains(
                $fileStub,
                'files',
                $this->fixture
            );
        }
    }

    public function removeFileDataProviderWithCollectionDataProvider()
    {
        return array(
            array( // test remove accepts arrays
                array(0, 2),
                'array',
            ),
            array( // tests remove accepts iterators
                array(0, 2),
                'ArrayIterator',
            ),
            array( // test remove doesn't error on an object not in the bag
                array(1, $this->createFileStub()),
                'array',
            ),
        );
    }

    /**
     * @dataProvider removeFileReturnsBooleanWithCollectionsDataProvider
     */
    public function testRemoveFileReturnsBooleanWithCollections($fileStubs, $type, $expectedReturn)
    {
        foreach ($fileStubs as &$value) {
            if (is_integer($value)) {
                $value = $this->fileStubs[$value];
            }
        }

        if ($type === 'ArrayIterator') {
            $fileStubs = new ArrayIterator($fileStubs);
        }

        $this->assertEquals(
            $expectedReturn,
            $this->fixture->remove($fileStubs)
        );
    }

    public function removeFileReturnsBooleanWithCollectionsDataProvider()
    {
        return array(
            array( // test remove returns true if all objects were removed
                array(0, 2),
                'array',
                true
            ),
            array( // test remove returns false if an object wasn't in the bag to begin with
                array(1, $this->createFileStub()),
                'array',
                false
            ),
        );
    }

    /**
     * @dataProvider removeFileReturnsBooleanDataProvider
     */
    public function testHasFileReturnsBoolean($fileStub, $expectedReturn)
    {
        if (is_integer($fileStub)) {
            $fileStub = $this->fileStubs[$fileStub];
        }

        $this->assertEquals(
            $this->fixture->has($fileStub),
            $expectedReturn
        );
    }

    /**
     * @dataProvider removeFileReturnsBooleanWithCollectionsDataProvider
     */
    public function testHasFileReturnsBooleanWithCollections($fileStubs, $type, $expectedReturn)
    {
        foreach ($fileStubs as &$value) {
            if (is_integer($value)) {
                $value = $this->fileStubs[$value];
            }
        }

        if ($type === 'ArrayIterator') {
            $fileStubs = new ArrayIterator($fileStubs);
        }

        $this->assertEquals(
            $expectedReturn,
            $this->fixture->has($fileStubs)
        );
    }

    public function testCount()
    {
        $this->assertEquals(
            3,
            $this->fixture->count()
        );
    }

    /**
     * @depends testCount
     */
    public function testClearEmptiesBag()
    {
        $this->fixture->clear();

        $this->assertEquals(
            0,
            $this->fixture->count()
        );
    }

    /**
     * @depends testCount
     */
    public function testSetMethodEmptiesBag()
    {
        $this->fixture->set(array());

        $this->assertEquals(
            0,
            $this->fixture->count()
        );
    }

    /**
     * @depends testSetMethodEmptiesBag
     */
    public function testSetMethodPopulatesBag()
    {
        $newStubs = $this->getFileStubs();
        $this->fixture->set($newStubs);
        foreach ($newStubs as $fileStub) {
            $this->assertAttributeContains(
                $fileStub,
                'files',
                $this->fixture
            );
        }
    }

    public function testIsEmptyWhenNotEmpty()
    {
        $this->assertFalse($this->fixture->isEmpty());
    }

    public function testIsNotEmptyWhenNotEmpty()
    {
        $this->assertTrue($this->fixture->isNotEmpty());
    }

    public function testToArrayMethod()
    {
        $this->assertSame(
            $this->fileStubs,
            $this->fixture->toArray()
        );
    }

    public function testGetIteratorReturnsIterator()
    {
        $this->assertInstanceOf(
            'Iterator',
            $this->fixture->getIterator()
        );
    }

    /**
     * @depends testGetIteratorReturnsIterator
     */
    public function testCanUseIteratorToIterateContents()
    {
        foreach ($this->fixture as $value) {
            $iteratorFiles[] = $value;
        }

        $this->assertSame(
            $this->fileStubs,
            $iteratorFiles
        );
    }

    public function testTransferMethod()
    {
        $fileStub = $this->fileStubs[0];

        $className = $this->fixtureClass;
        $newBag = new $className;

        $this->fixture->transfer($fileStub, $newBag);

        $this->assertAttributeNotContains(
            $fileStub,
            'files',
            $this->fixture
        );
        $this->assertAttributeContains(
            $fileStub,
            'files',
            $newBag
        );
    }

    public function testTransferMethodReturnsTrue()
    {
        $this->assertTrue(
            $this->fixture->transfer(
                $this->fileStubs[0],
                $this->getMockForAbstractClass('Axstrad\Component\Filesystem\FileBag')
            )
        );
    }

    public function testTransferMethodReturnsFalseIfFileNotInBag()
    {
        $this->assertFalse(
            $this->fixture->transfer(
                $this->createFileStub(),
                $this->getMockForAbstractClass('Axstrad\Component\Filesystem\FileBag')
            )
        );
    }

    public function testMergeMethod()
    {
        $fileStub = $this->createFileStub();

        $className = $this->fixtureClass;
        $anotherBag = new $className($fileStub);

        $this->fixture->merge($anotherBag);

        $this->assertAttributeContains(
            $fileStub,
            'files',
            $this->fixture
        );
        $this->assertAttributeNotContains(
            $fileStub,
            'files',
            $anotherBag
        );
    }

    public function testMergeMethodReturnsSelf()
    {
        $className = $this->fixtureClass;
        $anotherBag = new $className();

        $this->assertSame(
            $this->fixture,
            $this->fixture->merge($anotherBag)
        );
    }
}
