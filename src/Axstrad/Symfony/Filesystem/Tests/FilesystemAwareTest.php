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

namespace Axstrad\Symfony\Filesystem\Tests;

/**
 * Axstrad\Symfony\Filesystem\Tests\FilesystemAwareTest
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @package Axstrad\Symfony
 * @subpackage Filesystem\Tests
 * @group unittests
 */
class FilesystemAwareTest extends \PHPUnit_Framework_TestCase
{
    protected $fixture = null;

    public function setUp()
    {
        $this->fixture = new FilesystemAwareTestClass;
    }

    /**
     * covers Axstrad\Common\Traits\FilesystemAwareTrait::getFilesystem
     */
    public function testGetFilesystemReturnsSymfonyFilesystemObject()
    {
        $this->assertInstanceOf(
            'Symfony\Component\Filesystem\Filesystem',
            $this->fixture->getFilesystem()
        );
    }

    /**
     * covers Axstrad\Common\Traits\FilesystemAwareTrait::getFilesystem
     */
    public function testGetFilsystemReturnsSameObjectForEachInvokation()
    {
        $this->assertSame(
            $this->fixture->getFilesystem(),
            $this->fixture->getFilesystem()
        );
    }

    /**
     * covers Axstrad\Common\Traits\FilesystemAwareTrait::setFilesystem
     * uses Axstrad\Common\Traits\FilesystemAwareTrait::getFilesystem
     */
    public function testCanSetFilesystemObject()
    {
        $mock = $this->getMock('Symfony\Component\Filesystem\Filesystem');
        $this->fixture->setFilesystem($mock);

        $this->assertSame(
            $mock,
            $this->fixture->getFilesystem()
        );

    }
}
