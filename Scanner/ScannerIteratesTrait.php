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

use Axstrad\Component\Filesystem\Exception\InvalidArgumentException;
use Axstrad\Component\Filesystem\Exception\MissingIteratorException;
use Axstrad\Component\Filesystem\FileBag;
use Axstrad\Component\Filesystem\FileBag\BaseBag;
use DirectoryIterator;
use Iterator;
use OuterIterator;


/**
 * Axstrad\Component\Filesystem\Scanner\ScannerIteratesTrait
 *
 * This trait provides the methods for the
 * {@see Axstrad\Component\Filesystem\ScannerIterates ScannerIterates
 * interface}.
 * Note: You will still need to define the
 * {@see Axstrad\Component\Filesystem\Scanner::scan() scan()} method required
 * by {@see Axstrad\Component\Filesystem\Scanner Scanner interface}
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 */
trait ScannerIteratesTrait
{
    /**
     * @var Iterator
     */
    protected $iterator;

    /**
     * {@inheritDoc}
     */
    public function setIterator(Iterator $iterator)
    {
        if ( ! $iterator instanceof DirectoryIterator &&
            ! $iterator instanceof OuterIterator
        ) {
            throw InvalidArgumentException::create(
                'DirectoryIterator|OuterIterator',
                $iterator
            );
        }

        $this->iterator = $iterator;
        return $this;
    }

    protected function iterateFiles()
    {
        $fileBag = new BaseBag;
        foreach ($this->iterator as $file) {
            $fileBag->add($file);
        }
        return $fileBag;
    }

    protected function throwExceptionIfNoIterator()
    {
        if ($this->iterator === null) {
            throw new MissingIteratorException(
                "You must set the DirectoryIterator before attempting to scan"
            );
        }
    }
}
