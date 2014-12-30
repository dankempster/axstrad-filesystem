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
use DirectoryIterator;


/**
 * Axstrad\Component\Filesystem\Scanner\SimpleScanner
 *
 * Scans a directory for file using a DirectoryIterator.
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 */
class SimpleScanner implements
    Scanner
{
    use PathScannerTrait;
    use ScannerIteratesTrait {
        ScannerIteratesTrait::setIterator as protected;
    }


    /**
     * @return FileBag
     * @uses setIterator() To set the DirectoryIterator created from $path
     * @throws InvalidPathException If $path does not exist
     */
    public function scan()
    {
        $this->throwExceptionIfPathNotExist();

        $this->setIterator(new DirectoryIterator($this->getPath()));

        return $this->iterateFiles();
    }
}


