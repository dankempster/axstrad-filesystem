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
 */
namespace Axstrad\Common\Tests\Util\ArrayUtil;

use Axstrad\Common\Util\ArrayUtil;

/**
 * Axstrad\Common\Tests\Util\ArrayUtil\DecompilePathTest
 *
 * covers Axstrad\Common\Util\ArrayUtil::decompilePath
 * @group unittest
 * @uses Axstrad\Common\Util\ArrayUtil
 */
class DecompilePathTest extends \PHPUnit_Framework_TestCase
{
    /**
     */
	public function testCanParseDotNotation()
	{
		$this->assertEquals(array('one', 'two', 'three'), ArrayUtil::decompilePath('one.two.three'));
	}

    /**
     */
	public function testCanParseArrayNotation()
	{
		$this->assertEquals(array('one', 'two', 'three'), ArrayUtil::decompilePath('[one][two][three]'));
	}

    /**
     */
	public function testCanParseArrayNotation2()
	{
		$this->assertEquals(array('one', 'two', 'three'), ArrayUtil::decompilePath('one[two][three]'));
	}

    /**
     * @uses Axstrad\Common\Util\Debug
     * @uses Axstrad\Common\Exception\InvalidArgumentException::create
     */
	public function testExpectException()
	{
		$this->setExpectedException('Axstrad\Common\Exception\InvalidArgumentException');

		ArrayUtil::decompilePath(new \StdClass);
	}
}
