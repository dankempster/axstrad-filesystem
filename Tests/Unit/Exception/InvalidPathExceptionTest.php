<?php
namespace Axstrad\Component\Filesystem\Tests\Unit\Exception;

use Axstrad\Component\Filesystem\Exception\InvalidPathException;
use Axstrad\Component\Test\TestCase;


/**
 * @group unit
 */
class InvalidPathExceptionTest extends TestCase
{
    public function setUp()
    {
        $this->fixture = InvalidPathException::create(
            '/some/path'
        );
    }

    public function testIsInvalidPathExceptionclass()
    {
        $this->assertInstanceOf(
            'Axstrad\Component\Filesystem\Exception\InvalidPathException',
            $this->fixture
        );
    }

    public function testExceptionMessageMentionsThePath()
    {
        $this->assertContains(
            '/some/path',
            $this->fixture->getMessage()
        );
    }
}
