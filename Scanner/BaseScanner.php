<?php
namespace Axstrad\Component\Filesystem;

use Axstrad\Component\Filesystem\Exception\MissingDirectoryIteratorException;
use Axstrad\Component\Filesystem\Traits;
use Axstrad\Component\Filesystem\FileBag\FileBag;
use DirectoryIterator;


/**
 * Axstrad\Component\Filesystem\Scanner
 *
 * Scans a directory for file using a DirectoryIterator.
 */
class BaseScanner implements
    ScannerIterates
{
    use Traits\ScannerIteratesTrait;


    /**
     * @return FileBag
     * @uses getIterator() To get the current directory iterator
     */
    public function scan()
    {
        if ($this->iterator === null) {
            throw new MissingDirectoryIteratorException(
                "You must set the DirectoryIterator before attempting to scan"
            );
        }

        $bag = new FileBag;
        foreach ($this->iterator as $file) {
            $bag[] = $file;
        }

        return $bag;
    }
}


