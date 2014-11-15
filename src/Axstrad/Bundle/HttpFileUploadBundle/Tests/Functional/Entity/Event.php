<?php
namespace Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity;

use Doctrine\ORM\Mapping as ORM;

new ORM\Entity;
new ORM\Column;
new ORM\HasLifecycleCallbacks;

/**
 * Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity\Event
 *
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 */
class Event extends File
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    public $title;
}
