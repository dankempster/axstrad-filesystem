<?php
namespace Axstrad\Component\Filesystem\File;

use SplFileInfo;
use Traversable;


/**
 * Axstrad\Component\Filesystem\File\BaseFile
 */
class BaseFile extends AbstractFile
{
    /**
     * @param SplFileInfo $info
     */
    public function __construct(SplFileInfo $info)
    {
        if ($info instanceof Traversable) {
            $info = new SplFileInfo($info->getPathname());
        }
        $this->info = $info;
    }
}
