<?php
namespace Axstrad\Bundle\HttpFileUploadBundle\Model;

use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Axstrad\Bundle\HttpFileUploadBundle\Model\File
 */
interface File
{
    /**
     * Returns the file's name
     *
     * @return string
     */
    public function setFile(UploadedFile $file = null);

    /**
     * Returns the file's root path
     * @return UploadedFile
     */
    public function getFile();
}
