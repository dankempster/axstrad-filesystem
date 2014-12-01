<?php
namespace Axstrad\DoctrineExtensions\Persistence;

use Doctrine\Common\Persistence\ObjectManager;


/**
 * Axstrad\DoctrineExtensions\Persistence\ObjectManagerAwareTrait
 */
trait ObjectManagerAwareTrait
{
    /**
     * @var ObjectManager
     */
    protected $om;


    /**
     * @param ObjectManager $om
     * @return self
     */
    public function setObjectManager(ObjectManager $om)
    {
        $this->om = $om;
        return $this;
    }
}
