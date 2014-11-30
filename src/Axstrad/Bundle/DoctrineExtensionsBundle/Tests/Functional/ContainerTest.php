<?php
namespace Axstrad\Bundle\DoctrineExtensionsBundle\Tests\Functional;

use Axstrad\Bundle\TestBundle\Functional\WebTestCase;

/**
 * Axstrad\Bundle\DoctrineExtensionsBundle\Tests\Functional\Bundle\ContainerTest
 */
class ContainerTest extends WebTestCase
{
    protected $container;

    public function setUp()
    {
        parent::setUp();

        $this->container = self::$kernel->getContainer();
    }

    public function testActivatableListenerClassParameterIsDefined()
    {
        $this->assertTrue(
            $this->container->hasParameter('axstrad_doctrine_extensions.listener.activatable.class')
        );
    }
}
