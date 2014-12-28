<?php
namespace Axstrad\Component\Filesystem;


/**
 * Axstrad\Component\Filesystem\FileBag
 */
interface File
{
    /**
     * Returns the file's info
     *
     * @return SplFileInfo
     */
    public function getInfo();
}
