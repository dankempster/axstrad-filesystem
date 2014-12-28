<?php
namespace Axstrad\Component\Filesystem\Scanner;

use Axstrad\Component\Filesystem\FileBag\BaseBag;
use Axstrad\Component\Filesystem\Exception\MissingDirectoryIteratorException;
use Axstrad\Component\Filesystem\ScannerIterates;


/**
 * Axstrad\Component\Filesystem\Scanner\BaseIteratorScanner
 *
 * Base scanner to get you started.
 */
class BaseIteratorScanner implements
    ScannerIterates
{
    use ScannerIteratesTrait;


    /**
     * @return BaseBag
     */
    public function scan()
    {
        $this->throwExceptionIfNoIterator();

        return $this->iterateFiles();
    }
}


