<?php
namespace Axstrad\Bundle\DoctrineExtensionsBundle\Tests\Functional\Entity;

use Axstrad\Component\DoctrineOrm\Entity\IntegerIdTrait;
use Axstrad\DoctrineExtensions\Activatable\ActivatableEntity;
use Axstrad\DoctrineExtensions\Mapping\Annotation as Axstrad;
use Doctrine\ORM\Mapping as ORM;

new Axstrad\Activatable(array());

/**
 * @Axstrad\Activatable(fieldName="active")
 * @ORM\Entity
 */
class ExtendsEntityPage extends ActivatableEntity
{
    use IntegerIdTrait;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    public $title;
}
