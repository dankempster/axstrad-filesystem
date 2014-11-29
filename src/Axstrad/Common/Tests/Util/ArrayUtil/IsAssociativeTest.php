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
 * Axstrad\Common\Tests\Util\ArrayUtil\IsAssociativeTest
 *
 * covers Axstrad\Common\Util\ArrayUtil::isAssociative
 * @group unittest
 */
class IsAssociativeTest extends \PHPUnit_Framework_TestCase
{
    /**
     */
    public function testReturnsTrueForAssociateArray()
    {
        $this->assertTrue(
            ArrayUtil::isAssociative(array(
                'one' => 'one',
                'two' => 'two',
                'three' => 'three',
            ))
        );
    }

    /**
     */
    public function testReturnsTrueForArrayWithNumericAndKeyIndexes()
    {
        $this->assertTrue(
            ArrayUtil::isAssociative(array(
                'one' => 'one',
                'two' => 'two',
                3 => 'three',
            ))
        );
    }

    /**
     */
	public function testReturnsFalseForNumericallyIndexedArray()
	{
		$this->assertFalse(
			ArrayUtil::isAssociative(array(
				1 => 'one',
				2 => 'two',
				3 => 'three',
			))
		);
	}
}
