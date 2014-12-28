<?php
namespace Axstrad\Component\Filesystem\Tests\Functional\FileBag;


/**
 * @group functional
 */
class SplFileInfoBagConstructionTest extends BaseBagConstructionTest
{
    protected $fixtureClass = 'Axstrad\Component\Filesystem\FileBag\SplFileInfoBag';


    /**
     * @dataProvider canAddFileCollectionsDataProvider
     * @depends Axstrad\Component\Filesystem\Tests\Functional\FileBag\SplFileInfoBagAddTest::testCanAddFileCollections
     */
    public function testCanConstructWithFileCollections($fileStubs)
    {
        parent::testCanConstructWithFileCollections($fileStubs);
    }

    protected function getFileStubs()
    {
        return array(
            new \SplFileInfo(__DIR__.'/../../_asset/file.txt'),
            new \SplFileInfo(__DIR__.'/../../_asset/file.txt'),
        );
    }
}
