<?php
namespace Axstrad\Component\Filesystem\Tests;

use Axstrad\Component\Test\TestCase as BaseTestCase;

/**
 * Axstrad\Component\Filesystem\Tests\TestCase
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
