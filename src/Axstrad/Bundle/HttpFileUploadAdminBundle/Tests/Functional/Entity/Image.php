<?php
namespace Axstrad\Bundle\HttpFileUploadAdminBundle\Tests\Functional\Entity;

use Doctrine\ORM\Mapping as ORM;

new ORM\Entity;
new ORM\Column;

/**
 * Axstrad\Bundle\HttpFileUploadAdminBundle\Tests\Functional\Entity\Image
 *
 * @ORM\Entity()
 */
class Image extends File
{
    /**
     * @ORM\Column(type="string", length=50)
     * @var string
     */
    public $title;

    /**
     * @ORM\Column(type="string", length=50)
     * @var string
     */
    public $altText;

    /**
     * Get upload dir's web path.
     *
     * @return string
     */
    protected function getUploadDir()
    {
        return '/uploads/images';
    }
}
