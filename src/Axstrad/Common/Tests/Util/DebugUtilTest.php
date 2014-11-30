<?php
namespace Axstrad\Common\Tests\Util;

use Axstrad\Common\Util\Debug;
use Doctrine\Common\Util\Debug as DoctrineDebug;


/**
 * Axstrad\Common\Tests\Util\DebugUtilTest
 */
class DebugUtilTest extends \PHPUnit_Framework_TestCase
{
    public function testSummariseUsesDoctrineDebugWhenVarIsObject()
    {
        $obj = new self;
        $this->assertEquals(
            DoctrineDebug::toString($obj),
            Debug::summarise($obj)
        );
    }

    public function testSummariseReturnsIntergersAsSrings()
    {
        $this->assertSame(
            '100',
            Debug::summarise(100)
        );
    }

    public function testSummariseReturnsFloatsAsSrings()
    {
        $this->assertSame(
            '10.1',
            Debug::summarise(10.1)
        );
    }

    public function testSummariseReturnsBooleansAsStrings()
    {
        $this->assertEquals(
            'True',
            Debug::summarise(true)
        );
        $this->assertEquals(
            'False',
            Debug::summarise(false)
        );
    }

    public function testSummariseTruncatsStringsWithAnEllipse()
    {
        Debug::$options['varDump']['string']['max'] = 10;

        $this->assertEquals(
            '"Hello Worl..."',
            Debug::summarise('Hello World')
        );
    }

    public function testSummarisReturnsEmptyArrayAsString()
    {
        $this->assertEquals(
            "Array(0){}",
            Debug::summarise(array())
        );
    }

    public function testSummarisReturnsArrayAsStringWithFirstValue()
    {
        $this->assertEquals(
            "Array(1){100}",
            Debug::summarise(array(100))
        );
    }

    public function testSummarisReturnsArrayAsStringWithFirstHashAndValue()
    {
        $this->assertEquals(
            "Array(1){foo: 100}",
            Debug::summarise(array('foo' => 100))
        );
    }

    public function testSummarisReturnsMultidimentionalArrayAsStringWithFirstValue()
    {
        $this->assertEquals(
            "Array(1){Array(2)}",
            Debug::summarise(array(array('foo', 'bar')))
        );
    }

    public function testSummarisReturnsNullAsString()
    {
        $this->assertEquals(
            "Null",
            Debug::summarise(null)
        );
    }

    public function testDumpResetsXdebugVarDisplayMaxDepthSettingToOriginal()
    {
        if (!extension_loaded('xdebug')) {
            $this->markTestSkipped('XDebug extension is not loaded/installed');
        }

        $original = ini_set('xdebug.var_display_max_depth', 5);
        ob_start();
        Debug::dump(new self, 2);
        ob_end_clean();
        $this->assertEquals(
            5,
            ini_set('xdebug.var_display_max_depth', $original)
        );
    }
}
