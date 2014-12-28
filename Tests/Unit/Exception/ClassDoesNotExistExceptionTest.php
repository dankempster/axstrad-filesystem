<?php
namespace Axstrad\Component\Filesystem\Tests\Unit\Exception;

use Axstrad\Component\Filesystem\Exception\ClassDoesNotExistException;
use Axstrad\Component\Test\TestCase;


/**
 * @group unit
 */
class ClassDoesNotExistTest extends TestCase
{
    public function setUp()
    {
        $this->fixture = ClassDoesNotExistException::create(
            'My\Class'
        );
    }

    public function testIsClassDoesNotExistclass()
    {
        $this->assertInstanceOf(
            'Axstrad\Component\Filesystem\Exception\RuntimeException',
            $this->fixture
        );
    }

    public function testExceptionMessageMentionsThePath()
    {
        $this->assertContains(
            'My\Class',
            $this->fixture->getMessage()
        );
    }
}
