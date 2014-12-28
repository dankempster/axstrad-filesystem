<?php
namespace Axstrad\Component\Filesystem\Tests\Functional\FileBag;


/**
 * @group functional
 */
class FileBagConstructionTest extends BaseBagConstructionTest
{
    protected $fixtureClass = 'Axstrad\Component\Filesystem\FileBag\FileBag';


    /**
     * @dataProvider canAddFileCollectionsDataProvider
     * @depends Axstrad\Component\Filesystem\Tests\Functional\FileBag\FileBagAddTest::testCanAddFileCollections
     */
    public function testCanConstructWithFileCollections($fileStubs)
    {
        parent::testCanConstructWithFileCollections($fileStubs);
    }

    protected function getFileStubs()
    {
        return array(
            $this->getMockForAbstractClass('Axstrad\Component\Filesystem\File'),
            $this->getMockForAbstractClass('Axstrad\Component\Filesystem\File'),
        );
    }
}
