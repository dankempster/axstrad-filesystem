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
 * Axstrad\Common\Tests\Util\ArrayUtil\MergeRecursiveDistinctTest
 *
 * @cover Axstrad\Common\Util\ArrayUtil::mergeRecursiveDistinct
 * @group unittest
 */
class MergeRecursiveDistinctTest extends \PHPUnit_Framework_TestCase
{
    /**
     */
    public function testNumericIndexesAreAppended()
    {
        $this->assertEquals(
            array(
                'one', 'two'
            ),
            ArrayUtil::mergeRecursiveDistinct(array('one'), array('two'))
        );
    }

    /**
     */
    public function testDuplicateIndexesAreReplaced()
    {
        $this->assertEquals(
            array(
                'one'=>'three'
            ),
            ArrayUtil::mergeRecursiveDistinct(array('one'=>'two'), array('one'=>'three'))
        );
    }

    /**
     */
    public function testArgumentsAreConvertedToArrays()
    {
        $this->assertEquals(
            array('one', 'two'),
            ArrayUtil::mergeRecursiveDistinct('one', 'two')
        );
    }

    /**
     */
    public function testAcceptsAnyNumberOfArguments()
    {
        $assertion = array();
        $arguments = array();
        for ($x=1; $x<=100; $x++) {
            $arguments[] = array('test '.$x);
            $assertion[] = 'test '.$x;
        }

        $this->assertEquals(
            $assertion,
            call_user_func_array('Axstrad\Common\Util\ArrayUtil::mergeRecursiveDistinct', $arguments)
        );
    }

    /**
     */
    public function testArraysAreMergedRecursivly()
    {
        $array1 = array(
            'one'=>array('one'=>'bar1'),
            'two'=>'foo1',
        );
        $array2 = array(
            'one'=>array('two'=>'bar2'),
            'three'=>'foo2'
        );

        $this->assertEquals(
            array(
                'one' => array(
                    'one' => 'bar1',
                    'two' => 'bar2'
                ),
                'two' => 'foo1',
                'three' => 'foo2',
            ),
            ArrayUtil::mergeRecursiveDistinct($array1, $array2)
        );
    }

    /**
     */
    public function testIfOneArgumentIsArrayTreatAllAsArray()
    {
        $array1 = array('replace'=>'one');
        $array2 = array('replace'=>array('two'));

        $this->assertEquals(
            array(
                'replace'=>array('one','two'),
            ),
            ArrayUtil::mergeRecursiveDistinct($array1, $array2)
        );
    }

    /**
     */
    public function testValuesOfIntegerKeysAreAppendedOnlyIfTheirValueDoesntAlreadyExistsWithIntegerKey()
    {
        $array1 = array(0=>'bar', '1' => 'foo');
        $array2 = array(2=>'bar', '3' => 'foo');

        $this->assertEquals(
            array(
                0 => 'bar',
                1 => 'foo',
            ),
            ArrayUtil::mergeRecursiveDistinct($array1, $array2)
        );
    }
}
