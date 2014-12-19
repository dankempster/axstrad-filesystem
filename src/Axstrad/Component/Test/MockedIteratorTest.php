<?php
/**
 * This file is part of the Axstrad library.
 *
 * (c) Dan Kempster <dev@dankempster.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Dave Gardner <dave@davegardner.me.uk>
 * @package Axstrad\Component\Iterator
 */
namespace Axstrad\Component\Test;


/**
 * Axstrad\Component\Test\MockedIteratorTest
 *
 * Tests for _mock_ Iterator
 *
 * Here we have added a helper method (which you could add to your own abstract
 * base test class) that will help us mock iterators quickly and easily.
 */
class MockedIteratorTest extends \PHPUnit_Framework_TestCase
{
    protected function mockGenericIteratableList()
    {
        return $this->getMock('Axstrad\Component\Test\Example\ExampleList');
    }

    /**
     * Mock iterator
     *
     * This attaches all the required expectations in the right order so that
     * our iterator will act like an iterator!
     *
     * @param Iterator $iterator The iterator object; this is what we attach
     *      all the expectations to
     * @param array An array of items that we will mock up, we will use the
     *      keys (if needed) and values of this array to return
     * @param boolean $includeCallsToKey Whether we want to mock up the calls
     *      to "key"; only needed if you are doing foreach ($foo as $k => $v)
     *      as opposed to foreach ($foo as $v)
     */
    protected function mockIterator(
        \Iterator $iterator,
        array $items,
        $includeCallsToKey = FALSE
    ) {
        $iterator
            ->expects(
                $this->at(0)
            )
            ->method('rewind')
        ;
        $counter = 1;

        foreach ($items as $k => $v) {
            $iterator
                ->expects(
                    $this->at($counter ++)
                )
                ->method('valid')
                ->will(
                    $this->returnValue(TRUE)
                )
            ;
            $iterator
                ->expects(
                    $this->at($counter ++)
                )
                ->method('current')
                ->will(
                    $this->returnValue($v)
                )
            ;
            if ($includeCallsToKey) {
                $iterator
                    ->expects(
                        $this->at($counter ++)
                    )
                    ->method('key')
                    ->will(
                        $this->returnValue($k)
                    )
                ;
            }
            $iterator
                ->expects(
                    $this->at($counter ++)
                )
                ->method('next')
            ;
        }

        $iterator
            ->expects(
                $this->at($counter)
            )
            ->method('valid')
            ->will(
                $this->returnValue(FALSE)
            )
        ;
    }

    public function testConstructs()
    {
        $list = $this->mockGenericIteratableList();
        $this->assertInstanceOf('Axstrad\Component\Test\Example\ExampleList', $list);
        $this->assertInstanceOf('Iterator', $list);
    }

    public function testHasZeroItemsWhenWeHaventMockedMethods()
    {
        $list = $this->mockGenericIteratableList();
        $counter = 0;
        foreach ($list as $item) {
            // @codeCoverageIgnoreStart
            $counter++;
            // @codeCoverageIgnoreEnd
        }
        $this->assertEquals(0, $counter);
    }

    public function testWhenMockOneIterationWithNoKey()
    {
        $list = $this->mockGenericIteratableList();

        $this->mockIterator($list, array('This is the first item'));

        $counter = 0;
        foreach ($list as $value) {
            $counter++;
        }
        $this->assertEquals(1, $counter);
        $this->assertEquals('This is the first item', $value);
    }

    public function testWhenMockOneIterationWithKey()
    {
        $list = $this->mockGenericIteratableList();

        $this->mockIterator($list, array('key1' => 'This is the first item'), TRUE);

        $counter = 0;
        foreach ($list as $key => $value)
        {
            $counter++;
        }
        $this->assertEquals(1, $counter);
        $this->assertEquals('key1', $key);
        $this->assertEquals('This is the first item', $value);
    }

    public function testWhenMockThreeIterationWithNoKey()
    {
        $list = $this->mockGenericIteratableList();

        $expectedValues = array(
            'This is the first item',
            'This is the second item',
            'And the final item'
        );
        $this->mockIterator($list, $expectedValues);

        $counter = 0;
        $values = array();
        foreach ($list as $value)
        {
            $values[] = $value;
            $counter++;
        }
        $this->assertEquals(3, $counter);

        $this->assertEquals($expectedValues, $values);
    }

    public function testWhenMockThreeIterationWithKey()
    {
        $list = $this->mockGenericIteratableList();

        $expectedValues = array(
            'item1' => 'This is the first item',
            'foo'   => 'This is the second item!!',
            'bar'   => 'And the final item'
        );
        $this->mockIterator($list, $expectedValues, TRUE);

        $counter = 0;
        $values = array();
        foreach ($list as $key => $value)
        {
            $values[$key] = $value;
            $counter++;
        }
        $this->assertEquals(3, $counter);

        $this->assertEquals($expectedValues, $values);
    }
}
