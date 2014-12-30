<?php
/**
 * This file is part of the Axstrad library.
 *
 * (c) Dan Kempster <dev@dankempster.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright 2014-2015 Dan Kempster <dev@dankempster.co.uk>
 */

namespace Axstrad\Component\Filesystem\Tests\Unit\Exception;

use Axstrad\Component\Filesystem\Exception\InvalidPathException;
use Axstrad\Component\Test\TestCase;


/**
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @group unit
 */
class InvalidPathExceptionTest extends TestCase
{
    public function setUp()
    {
        $this->fixture = InvalidPathException::create(
            '/some/path'
        );
    }

    public function testIsInvalidPathExceptionclass()
    {
        $this->assertInstanceOf(
            'Axstrad\Component\Filesystem\Exception\InvalidPathException',
            $this->fixture
        );
    }

    public function testExceptionMessageMentionsThePath()
    {
        $this->assertContains(
            '/some/path',
            $this->fixture->getMessage()
        );
    }
}
