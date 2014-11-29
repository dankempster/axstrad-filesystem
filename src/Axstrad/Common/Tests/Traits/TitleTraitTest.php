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
 * Axstrad\Common\Tests\Traits\TitleTraitTest
 *
 * covers Axstrad\Common\Traits\TitleTrait::getTitle
 * covers Axstrad\Common\Traits\TitleTrait::setTitle
 * @group unittest
 * @uses Axstrad\Common\Traits\TitleTrait
 */
class TitleTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     */
    public function testTitleTrait()
    {
        $this->fixture = $this->getMockForTrait('Axstrad\Common\Traits\TitleTrait');

        $this->assertNull(
            $this->fixture->getTitle(),
            '$title doesn\'t start as NULL'
        );

        $this->assertEquals(
            $this->fixture,
            $this->fixture->setTitle('Bar'),
            'setTitle() didn\'t return self'
        );

        $this->assertEquals(
            'Bar',
            $this->fixture->getTitle()
        );


        $this->fixture->setTitle(null);
        $this->assertEquals(
            '',
            $this->fixture->getTitle(),
            '$title should be an empty string when null is passed'
        );
    }
}
