<?php
/**
 * This file is part of the Axstrad library.
 *
 * (c) Dan Kempster <dev@dankempster.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @package Axstrad\Common
 * @subpackage Tests
 * @subpackage Tests\Traits
 */
namespace Axstrad\Symfony\Filesystem\Tests;


/**
 * Axstrad\Symfony\Filesystem\Tests\FilesystemAwareTest
 *
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
