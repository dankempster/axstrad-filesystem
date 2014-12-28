<?php
namespace Axstrad\Component\Filesystem\Tests\Functional\FileBag;


/**
 * @group functional
 */
class FileBagAddTest extends BaseBagAddTest
{
    protected $fixtureClass = 'Axstrad\Component\Filesystem\FileBag\FileBag';

    public function addFileDataProvider()
    {
        return array(
            array(
                $this->getMockForAbstractClass('Axstrad\Component\Filesystem\File'),
            ),
        );
    }

    public function canAddFileCollectionsDataProvider()
    {
        $files = array(
            $this->getMockForAbstractClass('Axstrad\Component\Filesystem\File'),
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
}
