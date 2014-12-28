<?php
namespace Axstrad\Component\Filesystem\Tests\Functional\FileBag;

use Axstrad\Component\Test\TestCase as BaseTestCase;

/**
 * Axstrad\Component\Filesystem\Tests\Functional\FileBag\TestCase
 */
abstract class TestCase extends BaseTestCase
{
    protected $fixtureClass = null;

    public function setUp()
    {
        $className = $this->fixtureClass;
        $this->fixture = new $className();
    }
}
