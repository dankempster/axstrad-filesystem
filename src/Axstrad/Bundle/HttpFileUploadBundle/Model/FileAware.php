<?php
namespace Axstrad\Bundle\HttpFileUploadBundle\Model;


/**
 * Axstrad\Bundle\HttpFileUploadBundle\Model\FileAware
 */
interface FileAware
{
    public function getFile();

    public function setFile(File $file);
}
