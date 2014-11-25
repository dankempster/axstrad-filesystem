<?php
namespace Axstrad\DoctrineExtensions\Sluggable\Traits;

use Doctrine\ORM\Mapping as ORM;


/**
 * Axstrad\DoctrineExtensions\Sluggable\Trait\SluggableProperties
 */
trait SluggableProperties
{
    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @var string The entity's slug
     */
    protected $slug;
}
