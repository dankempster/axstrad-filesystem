<?php
namespace Axstrad\Component\Filesystem;


/**
 * Axstrad\Component\Filesystem\FileBag
 */
interface FileBag extends
    \Countable,
    \Traversable,
    \SeekableIterator
{
    /**
     * Add a file to the bag
     *
     * @param File $file The file to add
     * @return self
     */
    public function add(File $file);

    /**
     * Remove a file from the bag
     * @param File $file The File object to remove
     * @return self
     * @throws OutOfBoundsExcpeiotn If $file doesn't exist within the bag
     */
    public function remove(File $file);

    /**
     * Returns all files within the bag as an array.
     *
     * @return File[]
     */
    public function toArray();

    /**
     * Transfers a file to another bag, removing it from this one.
     *
     * @param File $file The file name or object to move to $newBag
     * @param FileBag $newBag The new Bag to move the file to
     * @return self
     * @throws OutOfBoundsExcpeiotn If $file doesn't exist within the bag
     */
    public function transfer(File $file, FileBag $newBag);
}
