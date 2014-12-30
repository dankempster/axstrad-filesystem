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

use Axstrad\Component\Filesystem\Scanner\RecursiveScanner;
use Axstrad\Component\Test\TestCase;
use org\bovigo\vfs\vfsStream;


/**
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @group functional
 */
class RecursiveScannerTest extends TestCase
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

        $this->fixture = new RecursiveScanner;
    }

    public function testWithDirectoryIterator()
    {
        $this->fixture->setPath(vfsStream::url('root/test-files'));
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
}
