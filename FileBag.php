<?php
namespace Axstrad\Component\Filesystem;

use Axstrad\Component\Filesystem\File;


/**
 * Axstrad\Component\Filesystem\FileBag
 */
interface FileBag extends
    \Countable,
    \IteratorAggregate
{
    /**
     * Add one or more files to the bag.
     *
     * This method will traverse a collection tree recursivley adding all the
     * File obejects it finds.
     *
     * @param FileBag|SplFileInfo[]|File[]|SplFileInfo|File $file The File or
     *        collection of Files to add
     * @return boolean Always true.
     * @see set
     */
    public function add($file);

    /**
     * Sets all the files in the bag.
     *
     * {@see clear() Clears} the existing files and populates the bag with
     * $files.
     *
     * @param FileBag|SplFileInfo[]|File[]|SplFileInfo|File $file The File or
     *        collection of Files to add
     * @return self
     * @see add
     */
    public function set($file);

    /**
     * Remove a file or collection of files from the bag.
     *
     * @param FileBag|SplFileInfo[]|File[]|SplFileInfo|File $file The file or
     *        collection of files to remove
     * @return boolean True if $file was in the bag and removed, false
     *         otherwise. If $files is a collection, true is only returned if
     *         all files are in this bag and removed.
     */
    public function remove($file);

    /**
     * Whether the bag contains one or more files.
     *
     * @param FileBag|SplFileInfo[]|File[]|SplFileInfo|File $file The file or
     *        collection of files to test.
     * @return boolean True If $file is in the collection. If $file is a
     *         collection of Files True is retuend only if the bag contains all
     *         the files.
     */
    public function has($file);

    /**
     * Empties the bag of all files
     *
     * @return File[]|SplFileInfo[] All the files that were in the bag.
     */
    public function clear();

    /**
     * Returns all files within the bag as an array.
     *
     * @return File[]|SplFileInfo[]
     */
    public function toArray();

    /**
     * Is the bag empty
     *
     * @return boolean
     * @see isNotEmpty
     */
    public function isEmpty();

    /**
     * Is the bag empty
     *
     * @return boolean
     * @see isEmpty
     */
    public function isNotEmpty();

    /**
     * Transfers a file to another bag, removing it from this one.
     *
     * @param SplInfoFile|File $file The file object to move to $newBag
     * @param FileBag $newBag The new Bag to move the file to
     * @return boolean True if the file was in this bag and transferred, false
     *         otherwise.
     */
    public function transfer($file, FileBag $newBag);

    /**
     * Merge another FileBag into this one.
     *
     * This will {@see transfer() tranfer} all file objects from $fileBag to
     * this one.
     *
     * @param FileBag $fileBag
     * @return self
     */
    public function merge(FileBag $fileBag);
}
