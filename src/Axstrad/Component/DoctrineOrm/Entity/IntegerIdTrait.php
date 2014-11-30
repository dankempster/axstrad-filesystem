<?php
namespace Axstrad\Component\DoctrineOrm\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Axstrad\Component\DoctrineOrm\Entity\IntegerIdTrait
 */
trait IntegerIdTrait
{
    /**
     * @var integer The entity's ID
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     */
    public function getId()
    {
        return $this->id;
    }
}
