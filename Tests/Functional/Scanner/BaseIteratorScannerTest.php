<?php
/**
 * This file is part of the Axstrad library.
 *
 * (c) Dan Kempster <dev@dankempster.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright 2014-2015 Dan Kempster <dev@dankempster.co.uk>
 */

namespace Axstrad\Component\Filesystem\Tests\Functional\Scanner;

use Axstrad\Component\Filesystem\Scanner\BaseIteratorScanner;
use Axstrad\Component\Test\TestCase;
use DirectoryIterator;
use org\bovigo\vfs\vfsStream;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;


/**
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @group functional
 */
class BaseIteratorScannerTest extends TestCase
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

        $this->fixture = new BaseIteratorScanner;
    }

    public function testWithDirectoryIterator()
    {
        $this->fixture->setIterator(new DirectoryIterator(
            vfsStream::url('root/test-files')
        ));

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

    public function testWithRecursiveDirectoryIterator()
    {
        $this->fixture->setIterator(
            new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator(
                    vfsStream::url('root/test-files')
                )
            )
        );
        $fileBag = $this->fixture->scan();
        $this->assertEquals(
            3,
            $fileBag->count()
        );
        $expectedName = array(
            0 => 'file-1.txt',
            1 => 'file-2.txt',
            2 => 'file-3.txt',
        );
        foreach ($fileBag as $key => $file) {
            $this->assertEquals(
                $expectedName[$key],
                $file->getFilename()
            );
        }
    }

    /**
     * @depends testWithDirectoryIterator
     */
    public function testWithFileClassnameSet()
    {
        $this->fixture->setIterator(new DirectoryIterator(
            vfsStream::url('root/test-files')
        ));
        $this->fixture->setFileClassname(
            'Axstrad\Component\Filesystem\File\BaseFile'
        );

        $fileBag = $this->fixture->scan();
        $this->assertContainsOnlyInstancesOf(
            'Axstrad\Component\Filesystem\File\BaseFile',
            $fileBag->toArray()
        );
    }

    /**
     * @depends testWithDirectoryIterator
     */
    public function testWithFileBagTypeSetToInfo()
    {
        $this->fixture->setIterator(new DirectoryIterator(
            vfsStream::url('root/test-files')
        ));
        $this->fixture->setBagType(
            BaseIteratorScanner::BAG_INFO
        );

        $this->assertInstanceOf(
            'Axstrad\Component\Filesystem\FileBag\SplFileInfoBag',
            $this->fixture->scan()
        );
    }

    /**
     * @depends testWithFileClassnameSet
     */
    public function testWithFileBagTypeSetToFile()
    {
        $this->fixture->setIterator(new DirectoryIterator(
            vfsStream::url('root/test-files')
        ));
        $this->fixture->setFileClassname(
            'Axstrad\Component\Filesystem\File\BaseFile'
        );
        $this->fixture->setBagType(
            BaseIteratorScanner::BAG_FILE
        );

        $this->assertInstanceOf(
            'Axstrad\Component\Filesystem\FileBag\FileBag',
            $this->fixture->scan()
        );
    }
}
