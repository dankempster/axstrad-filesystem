<?php
/**
 * This file is part of the Axstrad library.
 *
 * (c) Dan Kempster <dev@dankempster.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright 2014-2015 Dan Kempster <dev@dankempster.co.uk>
 */

namespace Axstrad\Component\Filesystem\Scanner;

use Axstrad\Component\Filesystem\Scanner;
use Axstrad\Component\Filesystem\Exception\InvalidPathException;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;


/**
 * Axstrad\Component\Filesystem\Scanner\RecursiveScanner
 *
 * Scans a directory for file using a DirectoryIterator.
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 */
class RecursiveScanner implements
    Scanner
{
    use PathScannerTrait;
    use ScannerIteratesTrait {
        ScannerIteratesTrait::setIterator as protected;
    }


    protected $path;


    /**
     * Get path
     *
     * @return string
     * @see setPath
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set path
     *
     * @param  string $path
     * @return self
     * @see getPath
     */
    public function setPath($path)
    {
        $this->path = (string) $path;
        return $this;
    }


    /**
     * @return FileBag
     * @uses setIterator() To set the DirectoryIterator created from $path
     * @throws InvalidPathException If $path does not exist
     */
    public function scan()
    {
        $this->throwExceptionIfPathNotExist();

        $this->setIterator(new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($this->getPath())
        ));

        return $this->iterateFiles();
    }
}


