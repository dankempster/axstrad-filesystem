<?php
namespace Axstrad\Component\DoctrineOrm\Entity;

use Axstrad\Component\DoctrineOrm\Entity;

/**
 * Axstrad\Component\DoctrineOrm\Entity\BaseEntity
 */
abstract class BaseEntity implements
    Entity
{
    /**
     * @var integer
     */
    protected $id;


    /**
     */
    public function getId()
    {
        return $this->id;
    }
}
