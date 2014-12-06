<?php
namespace Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity;

use Axstrad\Bundle\HttpFileUploadBundle\Entity\File as BaseFile;
use Doctrine\ORM\Mapping as ORM;

new ORM\Column;
new ORM\Entity;
new ORM\GeneratedValue;
new ORM\Id;
new ORM\Table;

/**
 * Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity\File
 *
 * @ORM\Entity()
 * @ORM\Table("file_test")
 */
class File extends BaseFile
{
    /**
     * Get the absolute directory path where these document should be saved.
     *
     * @return string
     * @uses getUploadDir
     */
    protected function getUploadRootDir()
    {
        return
             __DIR__.'/..'
            .DIRECTORY_SEPARATOR.'web'
            .$this->getUploadDir()
        ;
    }
}
