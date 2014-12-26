<?php
namespace Axstrad\Component\Filesystem;

use Iterator;


/**
 * Axstrad\Component\Filesystem\ScannerIterates
 *
 * Scanner uses an iterator to scan a directory.
 *
 * A {@see Axstrad\Component\Filestsren\Scanner scanner} implementing this
 * interface should use the iterator when scanning. It is intended the iterator
 * be a instance of {@link http://php.net/manual/en/class.directoryiterator.php
 * DirectorIterator}, but it should also accept an {@link
 * http://php.net/manual/en/class.outeriterator.php OuterIterator}.
 * When using an OuterIterator it is expected, but not enforced, that the
 * Iterator returns an SplInfoObject for it's current value.
 *
 * It should accept an {@link http://php.net/manual/en/class.outeriterator.php
 * OuterIterator} to allow the user to use any combination of Iterator to
 * pre-process the current value.
 * For example a user may wish to use the {@link
 * http://php.net/manual/en/class.filteriterator.php FilterIterator) to filter
 * out files; Or a {@link http://php.net/manual/en/class.cachingiterator.php
 * CachingIterator} to cache results.
 *
 * Here are some useful Iterators that extend {@link
 * http://php.net/manual/en/class.directoryiterator.php DirectorIterator}:
 *
 *  - Use {@link http://php.net/manual/en/class.filesystemiterator.php
 *    FilesystemIterator} to control how the iterator behaves. Like {@link
 *    http://php.net/manual/en/class.filesystemiterator.php#filesystemiterator.constants.follow-symlinks
 *    following symlinks}.
 *  - Use {@link http://php.net/manual/en/class.recursivedirectoryiterator.php
 *    RecursiveDirectoryIterator} to scan a director recursively. This also
 *    extends {@link http://php.net/manual/en/class.filesystemiterator.php
 *    FilesystemIterator}.
 *  - Use {@link http://php.net/manual/en/class.globiterator.php GlobIterator}
 *    to only scan files that match a pattern. This class also extends
 *    {@link http://php.net/manual/en/class.filesystemiterator.php
 *    FilesystemIterator}.
 *
 * Check out other {@link http://php.net/manual/en/spl.iterators.php SPL iterators} you may also find useful.
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 */
interface ScannerIterates extends
    Scanner
{
    /**
     * Set the {@link http://php.net/manual/en/class.directoryiterator.php
     * DirectorIterator}.
     *
     * An {@link http://php.net/manual/en/class.outeriterator.php
     * OuterIterator} will also be accepted, but it is expected  it return
     * {@link http://php.net/manual/en/class.splfileinfo.php SplFileInfo} as
     * it's current value.
     *
     * @param DirectoryIterator|OuterIterator $iterator The iterator to use to
     *        iterate the files.
     * @return self
     * @throws Axstrad\Component\Exception\InvalidArgumentException If $iterator
     *         is not an instance of {@link
     *         http://php.net/manual/en/class.directoryiterator.php
     *         DirectorIterator} or {@link
     *         http://php.net/manual/en/class.outeriterator.php OuterIterator}.
     */
    public function setIterator(Iterator $iterator);
}
