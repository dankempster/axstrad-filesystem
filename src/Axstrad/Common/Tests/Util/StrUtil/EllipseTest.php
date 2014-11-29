<?php
namespace Axstrad\Common\Tests\Util\StrUtil;

use Axstrad\Common\Util\StrUtil;


/**
 * Axstrad\Common\Tests\Util\StrUtil\EllipseTest
 *
 * covers Axstrad\Common\Util\StrUtil::ellipse
 * @group unittests
 */
class EllipseTest extends \PHPUnit_Framework_TestCase
{
    public function testReturnsStringWhenShorterThenMaxLength()
    {
        $this->assertEquals(
            "Hello World",
            StrUtil::ellipse(
                "Hello World",
                20
            )
        );
    }

    public function testReturnsTruncatedStringWithEllipse()
    {
        $this->assertEquals(
            "Hello Worl...",
            StrUtil::ellipse(
                "Hello World",
                10
            )
        );
    }
}
