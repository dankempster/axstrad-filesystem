<?php
namespace Axstrad\Bundle\DoctrineExtensionsBundle\Tests\Functional\Entity;

use Axstrad\Component\DoctrineOrm\Entity\BaseEntity;
use Axstrad\DoctrineExtensions\Mapping\Annotation as Axstrad;
use Doctrine\ORM\Mapping as ORM;

new ORM\Entity;
new ORM\Column;

/**
 * @Axstrad\Activatable(fieldName="active")
 * @ORM\Entity
 */
class SelfConfiguredPage extends BaseEntity
{
    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    public $title;

    /**
     * @ORM\Column(type="boolean")
     * @var boolean
     */
    public $active = false;
}
