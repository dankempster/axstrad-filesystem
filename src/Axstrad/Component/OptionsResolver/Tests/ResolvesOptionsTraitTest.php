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
 * @subpackage Traits
 */
namespace Axstrad\Component\OptionsResolver\Tests;


/**
 * Axstrad\Component\OptionsResolver\Tests\ResolvesOptionsTraitTest
 *
 * covers Axstrad\Component\OptionsResolver\ResolvesOptionsTrait::resolveOptions
 */
class ResolvesOptionsTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     */
    public function testInvokesConfigureOptionsWithOptionsResolver()
    {
        $mock = $this->getMockForAbstractClass(__NAMESPACE__.'\ResolvesOptionsAbstractTestClass');
        $mock->expects($this->once())
             ->method('configureOptions')
             ->with($this->equalTo(new \Symfony\Component\OptionsResolver\OptionsResolver))
        ;

        $mock->resolveOptions(array());
    }

    /**
     * @depends testInvokesConfigureOptionsWithOptionsResolver
     * @expectedException Symfony\Component\OptionsResolver\Exception\MissingOptionsException
     */
    public function testThrowsExceptionWhenMissingOption()
    {
        $fixture = new ResolvesOptionsTestClass();
        $fixture->resolveOptions(array());
    }

    /**
     * @depends testInvokesConfigureOptionsWithOptionsResolver
     */
    public function testThrowsExceptionForUnexpectedOption()
    {
        try {
            $fixture = new ResolvesOptionsTestClass();
            $fixture->resolveOptions(array('hello' => 'world'));
        }
        catch (\Exception $e) {
            // TODO: use Symfony version to work out which exception should be expected.
            if ($e instanceof \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException) {
                $this->setExpectedException('Symfony\Component\OptionsResolver\Exception\InvalidOptionsException');
            }
            elseif ($e instanceof \Symfony\Component\OptionsResolver\Exception\UndefinedOptionsException) {
                $this->setExpectedException('Symfony\Component\OptionsResolver\Exception\UndefinedOptionsException');
            }
            throw $e;
        }

        $this->fail('An expected exception has not been raised.');
    }

    /**
     * @depends testInvokesConfigureOptionsWithOptionsResolver
     */
    public function testReturnsResolvedOptions()
    {
        $fixture = new ResolvesOptionsTestClass();

        $options = array('foo' => 'hello world');

        $this->assertEquals(
            $options,
            $fixture->resolveOptions($options)
        );
    }
}
