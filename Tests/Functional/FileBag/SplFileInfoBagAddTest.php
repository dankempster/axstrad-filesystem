<?php
namespace Axstrad\Component\Filesystem\Tests\Functional\FileBag;


/**
 * @group functional
 */
class SplFileInfoBagAddTest extends BaseBagAddTest
{
    protected $fixtureClass = 'Axstrad\Component\Filesystem\FileBag\SplFileInfoBag';

    public function addFileDataProvider()
    {
        return array(
            array(
                new \SplFileInfo(__DIR__.'/../../_asset/file.txt'),
            ),
        );
    }

    public function canAddFileCollectionsDataProvider()
    {
        $files = array(
            new \SplFileInfo(__DIR__.'/../../_asset/file.txt'),
            new \SplFileInfo(__DIR__.'/../../_asset/file.txt'),
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
