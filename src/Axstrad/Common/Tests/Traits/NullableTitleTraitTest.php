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
 * Axstrad\Common\Tests\Traits\NullableTitleTraitTest
 *
 * covers Axstrad\Common\Traits\NullableTitleTrait::getTitle
 * covers Axstrad\Common\Traits\NullableTitleTrait::setTitle
 * @group unittest
 * @uses Axstrad\Common\Traits\NullableTitleTrait
 */
class NullableTitleTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @depends Axstrad\Common\Tests\Traits\TitleTraitTest::testTitleTrait
     */
    public function testNullableTitleTrait()
    {
        $this->fixture = $this->getMockForTrait('Axstrad\Common\Traits\NullableTitleTrait');

        $this->fixture->setTitle('Bar');
        $this->fixture->setTitle(null);
        $this->assertNull($this->fixture->getTitle());
    }
}
