<?php
namespace Axstrad\Common\Tests\Util\StrUtil;

use Axstrad\Common\Util\StrUtil;


/**
 * Axstrad\Common\Tests\Util\StrUtil\WrapSubstrTest
 *
 * covers Axstrad\Common\Util\StrUtil::wrapSubstr
 * @group unittests
 */
class WrapSubstrTest extends \PHPUnit_Framework_TestCase
{
    public function testCanWrapStartOfString()
    {
        $this->assertEquals(
            "<span>Hello</span> World",
            StrUtil::wrapSubstr(
                "Hello World",
                "Hello",
                "span"
            )
        );
    }

    public function testCanWrapEndOfString()
    {
        $this->assertEquals(
            "Hello <span>World</span>",
            StrUtil::wrapSubstr(
                "Hello World",
                "World",
                "span"
            )
        );
    }

    public function testCanWrapMiddleOfString()
    {
        $this->assertEquals(
            "Hello <span>There</span> World",
            StrUtil::wrapSubstr(
                "Hello There World",
                "There",
                "span"
            )
        );
    }

    /**
     * @depends testCanWrapStartOfString
     */
    public function testIsCaseInsensitive()
    {
        $this->assertEquals(
            "<span>HELLO</span> WORLD",
            StrUtil::wrapSubstr(
                "HELLO WORLD",
                "hello",
                "span"
            )
        );
    }

    public function testWrapsUsingSpansAsDefault()
    {
        $this->assertEquals(
            "<span>this</span> should be rapped a span",
            StrUtil::wrapSubstr(
                "this should be rapped a span",
                "this"
            )
        );
    }

    /**
     * @depends testWrapsUsingSpansAsDefault
     */
    public function testFallsbackToSpanElements()
    {
        $this->assertEquals(
            "<span>this</span> should be rapped in a span",
            StrUtil::wrapSubstr(
                "this should be rapped in a span",
                "this",
                null
            )
        );
    }

    public function testNotWrapHaystackOnFailure()
    {
        $this->assertEquals(
            'nothing should be wrapped',
            StrUtil::wrapSubstr(
                'nothing should be wrapped',
                'needle',
                'span',
                false
            )
        );
    }

    /**
     * @depends testNotWrapHaystackOnFailure
     */
    public function testNotWrapHaystackOnFailureByDefault()
    {
        $this->assertEquals(
            'nothing should be wrapped',
            StrUtil::wrapSubstr(
                'nothing should be wrapped',
                'needle',
                'span'
            )
        );
    }

    public function testWrapHaystackOnFailure()
    {
        $this->assertEquals(
            '<span>everything should be wrapped</span>',
            StrUtil::wrapSubstr(
                'everything should be wrapped',
                'needle',
                'span',
                true
            )
        );
    }

    public function testRemovesTrailingS()
    {
        $this->assertEquals(
            'hello <span>world</span>',
            StrUtil::wrapSubstr(
                'hello world',
                'worlds',
                'span'
            )
        );
    }
}
