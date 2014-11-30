<?php
namespace Axstrad\Bundle\DoctrineExtensionsBundle\Tests\Functional\Entity;

use Axstrad\Component\DoctrineOrm\Entity\BaseEntity;
use Axstrad\DoctrineExtensions\Activatable\ActivatableTrait;
use Axstrad\DoctrineExtensions\Mapping\Annotation as Axstrad;
use Doctrine\ORM\Mapping as ORM;

new ORM\Column;
new ORM\Entity;
new ORM\GeneratedValue;
new ORM\Id;

/**
 * @Axstrad\Activatable(fieldName="active")
 * @ORM\Entity
 */
class UsesTraitPage extends BaseEntity
{
    use ActivatableTrait;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    public $title;
}
