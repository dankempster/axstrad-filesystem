<?php
namespace Axstrad\Common\Tests\Exception;

use Axstrad\Common\Exception\InvalidArgumentException;

/**
 * Axstrad\Common\Tests\Exception\InvalidArgumentExceptionTest
 *
 * @group unittests
 * covers Axstrad\Common\Exception\InvalidArgumentException::create
 * @uses Axstrad\Common\Util\Debug
 * @uses Axstrad\Common\Util\ArrayUtil
 * @uses Axstrad\Common\Util\StrUtil
 */
class InvalidArgumentExceptionTest extends \PHPUnit_Framework_TestCase
{
    protected $fixture;

    public function setUp()
    {
        $this->fixture = InvalidArgumentException::create('String', 2, 1, 999);
    }

    public function testCreatesSelf()
    {
        $this->assertInstanceOf(
            'Axstrad\Common\Exception\InvalidArgumentException',
            $this->fixture
        );
    }

    public function testExceptionMessageContainsExpected()
    {
        $this->assertStringMatchesFormat(
            '%AString%A',
            $this->fixture->getMessage()
        );
    }

    public function testExceptionMessageContainsActual()
    {
        $this->assertStringMatchesFormat(
            '%A2%A',
            $this->fixture->getMessage()
        );
    }

    public function testExceptionMessageContainsParameterNumber()
    {
        $this->assertStringMatchesFormat(
            '%A1%A',
            $this->fixture->getMessage()
        );
    }

    public function testExceptionMessageIsPrefixedWithCode()
    {
        $this->assertStringMatchesFormat(
            '[999]%A',
            $this->fixture->getMessage()
        );
    }

    public function testExceptionCodeIsSet()
    {
        $this->assertEquals(
            999,
            $this->fixture->getCode()
        );
    }
}
