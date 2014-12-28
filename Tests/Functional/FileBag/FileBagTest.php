<?php
namespace Axstrad\Component\Filesystem\Tests\Functional\FileBag;


/**
 * @group functional
 * @depends Axstrad\Component\Filesystem\Tests\Functional\FileBag\FileBagConstructionTest::testCanConstructWithFileCollections
 */
class FileBagTest extends BaseBagTest
{
    protected $fixtureClass = 'Axstrad\Component\Filesystem\FileBag\FileBag';


    protected function getFileStubs()
    {
        return array(
            $this->getMockForAbstractClass('Axstrad\Component\Filesystem\File'),
            $this->getMockForAbstractClass('Axstrad\Component\Filesystem\File'),
            $this->getMockForAbstractClass('Axstrad\Component\Filesystem\File'),
        );
    }

    /**
     * @expectedException Axstrad\Component\Filesystem\Exception\InvalidArgumentException
     */
    public function testCanNotAddSplFileInfo()
    {
        $this->fixture->add(new \SplFileInfo(__DIR__.'/../../_assers/a-file.txt'));
    }
}
