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
namespace Axstrad\Common\Tests\Traits;


/**
 * Axstrad\Common\Tests\Traits\NullableNameTraitTest
 *
 * covers Axstrad\Common\Traits\NullableNameTrait::getName
 * covers Axstrad\Common\Traits\NullableNameTrait::setName
 * @group unittest
 * @uses Axstrad\Common\Traits\NullableNameTrait
 */
class NullableNameTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @depends Axstrad\Common\Tests\Traits\NameTraitTest::testNameTrait
     */
    public function testNullableNameTrait()
    {
        $this->fixture = $this->getMockForTrait('Axstrad\Common\Traits\NullableNameTrait');

        $this->fixture->setName('Bar');
        $this->fixture->setName(null);
        $this->assertNull($this->fixture->getName());
    }
}
