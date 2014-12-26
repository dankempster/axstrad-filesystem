<?php
namespace Axstrad\Component\Filesystem\Traits;

use Axstrad\Component\Filesystem\Exception\InvalidArgumentException;
use DirectoryIterator;
use Iterator;
use OuterIterator;


/**
 * Axstrad\Component\Filesystem\Traits\ScannerIteratesTrait
 *
 * This trait provides the methods for the
 * {@see Axstrad\Component\Filesystem\ScannerIterates ScannerIterates
 * interface}.
 * Note: You will still need to define the
 * {@see Axstrad\Component\Filesystem\Scanner::scan() scan()} method required
 * by {@see Axstrad\Component\Filesystem\Scanner Scanner interface}
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
        if (!$iterator instanceof DirectoryIterator &&
            !$iterator instanceof OuterIterator
        ){
            throw InvalidArgumentException::create(
                'DirectoryIterator|OuterIterator',
                $iterator
            );
        }

        $this->iterator = $iterator;
        return $this;
    }
}
