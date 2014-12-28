<?php
namespace Axstrad\Component\Filesystem\Tests\Functional\FileBag;


/**
 * @group functional
 * @depends Axstrad\Component\Filesystem\Tests\Functional\FileBag\SplFileInfoBagConstructionTest::testCanConstructWithFileCollections
 */
class SplFileInfoBagTest extends BaseBagTest
{
    protected $fixtureClass = 'Axstrad\Component\Filesystem\FileBag\SplFileInfoBag';


    protected function getFileStubs()
    {
        return array(
            new \SplFileInfo(__DIR__.'/../../_asset/file.txt'),
            new \SplFileInfo(__DIR__.'/../../_asset/file.txt'),
            new \SplFileInfo(__DIR__.'/../../_asset/file.txt'),
        );
    }

    protected function createFileStub()
    {
        return new \SplFileInfo(__DIR__.'/../../_asset/file.txt');
    }

    /**
     * @expectedException Axstrad\Component\Filesystem\Exception\InvalidArgumentException
     */
    public function testCanNotAddFileObject()
    {
        $this->fixture->add($this->getMockForAbstractClass('Axstrad\Component\Filesystem\File'));
    }
}
