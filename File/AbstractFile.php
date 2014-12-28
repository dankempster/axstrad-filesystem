<?php
namespace Axstrad\Component\Filesystem\File;

use Axstrad\Component\Filesystem\File;


/**
 * Axstrad\Component\Filesystem\File\AbstractFile
 */
abstract class AbstractFile implements
    File
{
    /**
     * @var SplFileInfo
     */
    protected $info;


    /**
     * Get info
     *
     * @return SplFileInfo
     * @see setInfo
     */
    public function getInfo()
    {
        return $this->info;
    }
}
