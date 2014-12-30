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

namespace Axstrad\Component\Filesystem\Tests;

use Axstrad\Component\Test\TestCase as BaseTestCase;

/**
 * Axstrad\Component\Filesystem\Tests\TestCase
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 */
abstract class TestCase extends BaseTestCase
{
    protected function createFileStub()
    {
        $stub = $this->getMockForAbstractClass('Axstrad\Component\Filesystem\File');
        $stub->expects($this->any())
            ->method('getInfo')
            ->will($this->returnValue(
                $this->createSplFileInfo()
            ))
        ;
        return $stub;
    }

    protected function createSplFileInfo()
    {
        return new \SplFileInfo(__DIR__.'/../_asset/file.txt');
    }

    protected function createSplDirInfo()
    {
        return new \SplFileInfo(__DIR__.'/../_asset');
    }
}
