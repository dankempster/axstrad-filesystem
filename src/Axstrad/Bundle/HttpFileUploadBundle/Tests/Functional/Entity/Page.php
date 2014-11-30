<?php
namespace Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity;

use Axstrad\Bundle\HttpFileUploadBundle\Model\File as FileInterface;
use Axstrad\Bundle\HttpFileUploadBundle\Model\FileAware;
use Axstrad\Component\Content\Orm\Article;
use Doctrine\ORM\Mapping as ORM;

new ORM\Entity;
new ORM\ManyToOne;

/**
 * Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity\Page
 *
 * @ORM\Entity()
 */
class Page extends Article implements
    FileAware
{
    /**
     * @ORM\ManyToOne(targetEntity="Image")
     * @var Image
     */
    public $image;

    public function getFile()
    {
        return $this->image;
    }

    public function setFile(FileInterface $file)
    {
        $this->image = $file;
        return $this;
    }
}
