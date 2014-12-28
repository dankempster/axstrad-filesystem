<?php
namespace Axstrad\Component\Filesystem\Tests\Functional\Scanner;

use Axstrad\Component\Filesystem\Scanner\SimpleScanner;
use Axstrad\Component\Test\TestCase;
use org\bovigo\vfs\vfsStream;


/**
 * @group functional
 */
class SimpleScannerTest extends TestCase
{
    public function setUp()
    {
        vfsStream::setup('root', null, array(
            'test-files' => array(
                'file-1.txt' => 'File 1',
                'file-2.txt' => 'File 2',
                'dir-1' => array(
                    'file-3.txt' => 'File 3',
                ),
            ),
        ));

        $this->fixture = new SimpleScanner;
    }

    public function testWithDirectoryIterator()
    {
        $this->fixture->setPath(vfsStream::url('root/test-files'));
        $fileBag = $this->fixture->scan();
        $this->assertEquals(
            2,
            $fileBag->count()
        );
        $expectedName = array(
            0 => 'file-1.txt',
            1 => 'file-2.txt',
        );
        foreach ($fileBag as $key => $file) {
            $this->assertEquals(
                $expectedName[$key],
                $file->getFilename()
            );
        }
    }
}
