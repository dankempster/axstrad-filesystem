<?php
namespace Axstrad\DoctrineExtensions\Tests\Activatable\ActivatableListener;

use Axstrad\DoctrineExtensions\Activatable\ActivatableListener;

/**
 * Axstrad\DoctrineExtensions\Tests\Activatable\ActivatableListener\LoadClassMetaDataTest
 *
 * @uses Axstrad\DoctrineExtensions\Activatable\ActivatableListener
 */
class LoadClassMetaDataTest extends \PHPUnit_Framework_TestCase
{
    protected $fixture = null;

    public function setUp()
    {
        $this->fixture = new ActivatableListener;
    }

    /**
     * covers Axstrad\DoctrineExtensions\Activatable\ActivatableListener::getSubscribedEvents
     */
    public function testSubscribesToLoadClassMetaDataEvent()
    {
        $this->assertEquals(
            array(
                'loadClassMetadata',
            ),
            $this->fixture->getSubscribedEvents()
        );
    }

    /**
     * covers Axstrad\DoctrineExtensions\Activatable\ActivatableListener::getNamespace
     */
    public function testGetNamespace()
    {
        $this->assertEquals(
            'Axstrad\DoctrineExtensions\Activatable',
            $this->fixture->getNamespace()
        );
    }
}
