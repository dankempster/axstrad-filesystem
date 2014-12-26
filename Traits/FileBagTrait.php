<?php
namespace Axstrad\Component\Filesystem\Traits;


/**
 * Axstrad\Component\Filesystem\Traits\FileBagTrait
 */
trait FileBagTrait
{
    /**
     * @var ArrayCollection
     */
    protected $files;


    /**
     * Get all file
     *
     * @return File[]
     */
    public function get()
    {
        return $this->files->toArray();
    }

    /**
     * Add one or more files to the bag.
     *
     * This method will traverse a collection tree recursivley adding all the
     * File obejects it finds.
     *
     * @param FileBag|File[]|File $file The File or collection of Files to add
     * @return self
     * @see set
     * @throws InvalidArgumentException If $file is not a valid value
     * @throws OutOfBoundsException If $file is an array or FileBag that
     *         contains a value other than a File object.
     */
    public function add($file)
    {
        if (($isArray = is_array($file)) || $file instanceof FileBag) {
            foreach ($file as $key => $f) {
                try {
                    $this->add($f);
                }
                catch (InvalidArgumentException $e) {
                    throw new OutOfBoundsException(
                        sprintf(
                            "%s's value at key %s caused InvalidArgumentException",
                            $isArray ? 'Array' : 'FileBag',
                            $key
                        ),
                        null,
                        $e
                    );
                }
                catch (OutOfBoundsException $e) {
                    throw new OutOfBoundsException(
                        sprintf(
                            "%s's value at key %s caused OutOfBoundsException",
                            $isArray ? 'Array' : 'FileBag',
                            $key
                        ),
                        null,
                        $e
                    );
                }
            }
        }
        elseif ($file instanceof File) {
            if (!$this->files->contains($file)) {
                $this->files->add($file);
            }
        }
        else {
            throw InvalidArgumentException::create(
                sprintf(
                    '%1$s/File|%1$s/File[]|%1$s/FileBag',
                    __NAMESPACE__
                ),
                $file
            );
        }

        return $this;
    }

    /**
     * Clears the existing files and populates the collection with
     * $files
     *
     * @param FileBag|File[]|File $file The File or collection of Files to set
     * @return self
     * @uses clear To clear the bag
     * @uses add To add $files to the bag
     */
    public function set($files)
    {
        $this->clear();
        $this->add($files);
        return $this;
    }

    /**
     * Remove a file
     *
     * @param FileBag|File[]|File $file The File or collection of Files to remove
     * @return self
     * @see clear
     */
    public function remove($file)
    {
        if (($isArray = is_array($file)) || $file instanceof FileBag) {
            foreach ($file as $key => $f) {
                try {
                    $this->remove($f);
                }
                catch (InvalidArgumentException $e) {
                    throw new OutOfBoundsException(
                        sprintf(
                            "%s's value at key %s caused InvalidArgumentException",
                            $isArray ? 'Array' : 'FileBag',
                            $key
                        ),
                        null,
                        $e
                    );
                }
                catch (OutOfBoundsException $e) {
                    throw new OutOfBoundsException(
                        sprintf(
                            "%s's value at key %s caused OutOfBoundsException",
                            $isArray ? 'Array' : 'FileBag',
                            $key
                        ),
                        null,
                        $e
                    );
                }
            }
        }
        elseif ($file instanceof File) {
            if ($this->files->contains($file)) {
                $this->files->remove($file);
            }
        }
        else {
            throw InvalidArgumentException::create(
                sprintf(
                    '%1$s/File|%1$s/File[]|%1$s/FileBag',
                    __NAMESPACE__
                ),
                $file
            );
        }
        return $this;
    }

    /**
     * Whether the bag contains one or more files.
     *
     * @param FileBag|File[]|File $file The File or collection of Files to test
     * @return boolean If $file is a collection of Files, True will only be
     *         returned if the bag contains all the files.
     */
    public function has($file)
    {
        if (($isArray = is_array($file)) || $file instanceof FileBag) {
            foreach ($file as $key => $f) {
                try {
                    if (!$this->has($f)) {
                        return false;
                    }
                }
                catch (InvalidArgumentException $e) {
                    throw new OutOfBoundsException(
                        sprintf(
                            "%s's value at key %s caused InvalidArgumentException",
                            $isArray ? 'Array' : 'FileBag',
                            $key
                        ),
                        null,
                        $e
                    );
                }
                catch (OutOfBoundsException $e) {
                    throw new OutOfBoundsException(
                        sprintf(
                            "%s's value at key %s caused OutOfBoundsException",
                            $isArray ? 'Array' : 'FileBag',
                            $key
                        ),
                        null,
                        $e
                    );
                }
            }
        }
        elseif ($file instanceof File) {
            return $this->contains($file);
        }
        else {
            throw InvalidArgumentException::create(
                sprintf(
                    '%1$s/File|%1$s/File[]|%1$s/FileBag',
                    __NAMESPACE__
                ),
                $file
            );
        }

        return true;
    }

    /**
     * Clear all files
     *
     * @return self
     * @see remove
     */
    public function clear()
    {
        $this->files->clear();
        return $this;
    }

    /**
     * How many files does the bag hold?
     *
     * @return integer
     * @uses get
     */
    public function count()
    {
        return count($this->get());
    }

    /**
     * Is the bag empty
     *
     * @return boolean
     * @uses count
     * @see isNotEmpty
     */
    public function isEmpty()
    {
        return $this->count() == 0;
    }

    /**
     * Is the bag empty
     *
     * @return boolean
     * @uses count
     * @see isEmpty
     */
    public function isNotEmpty()
    {
        return $this->count() > 0;
    }

    /**
     * Transfer a file from this bag to another.
     *
     * @param File $file The file to transfer
     * @param FileBag The bag to tranfer $file to
     * @return self
     * @throws OutOfBoundsException If $file is not within this bag.
     */
    public function transfer($file, FileBag $to)
    {
        if (!$this->files->contains($file)) {
            throw new OutOfBoundsException(
                "\$file doesn't exist within this bag"
            );
        }

        $this->remove($file);
        $toBag->add($file);
    }

    /**
     * Merge a FileBag into this one.
     *
     * This will {@see transfer tranfer()} all File obects from $fileBag to this
     * one.
     *
     * @param FileBag $fileBag
     * @return self
     * @uses transfer
     */
    public function merge(FileBag $fileBag)
    {
        foreach ($fileBag as $file) {
            $fileBag->transfer($file, $this);
        }
        return $this;
    }
}
