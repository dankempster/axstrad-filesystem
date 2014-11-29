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
 * Axstrad\Common\Tests\Traits\NameTraitTest
 *
 * covers Axstrad\Common\Traits\NameTrait::getName
 * covers Axstrad\Common\Traits\NameTrait::setName
 * @group unittest
 * @uses Axstrad\Common\Traits\NameTrait
 */
class NameTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     */
    public function testNameTrait()
    {
        $this->fixture = $this->getMockForTrait('Axstrad\Common\Traits\NameTrait');

        $this->assertNull(
            $this->fixture->getName(),
            '$name doesn\'t start as NULL'
        );

        $this->assertEquals(
            $this->fixture,
            $this->fixture->setName('Bar'),
            'setName() didn\'t return self'
        );

        $this->assertEquals(
            'Bar',
            $this->fixture->getName()
        );


        $this->fixture->setName(null);
        $this->assertEquals(
            '',
            $this->fixture->getName(),
            '$name should be an empty string when null is passed'
        );
    }
}
