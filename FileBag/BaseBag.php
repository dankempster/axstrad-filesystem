<?php
namespace Axstrad\Component\Filesystem\FileBag;

use Axstrad\Component\Filesystem\File;
use Axstrad\Component\Filesystem\FileBag as FileBagInterface;
use Axstrad\Component\Filesystem\Exception\InvalidArgumentException;
use Axstrad\Component\Filesystem\Exception\UnexpectedValueException;
use DirectoryIterator;
use Doctrine\Common\Collections\ArrayCollection;
use SplFileInfo;
use Traversable;


/**
 * Axstrad\Component\Filesystem\FileBag\BaseBag
 *
 * Concrete implementation of {@see Axstrad\Component\Filesystem\FileBag
 * FileBag} which uses a Doctrine\Common\Collections\ArrayCollection for
 * internal storage.
 */
class BaseBag implements
    FileBagInterface
{
    /**
     * @var ArrayCollection
     */
    protected $files;


    /**
     * Class constructor.
     *
     * Initalises the internal collection
     *
     * @param $files null|Traversable|Files[]|SplFileInfo[]
     * @throws InvalidArgumentException If $files is not a valid type.
     */
    public function __construct($files = null)
    {
        $this->files = new ArrayCollection;

        if ($files !== null) {
            $this->add($files);
        }
    }

    /**
     * {@inheritDoc}
     *
     * @throws InvalidArgumentException If $file is not a valid value
     * @throws UnexpectedValueException If $file is an array or FileBag that
     *         contains a value that’s not a File or SplInfoObject object.
     */
    public function add($file)
    {
        // Need to convert DirectorIterators to SplFileInfo objects as it
        // appears ArrayCollection can't distinguish between them.
        if ($file instanceof DirectoryIterator &&
            ! $file->isDir() &&
            ! $file->isDot() &&
            ! $file->getFilename() != '..'
        ) {
            $file = new \SplFileInfo($file->getPathname());
        }

        $fileInfo = $file instanceof File
            ? $file->getInfo()
            : $file
        ;

        if ($fileInfo instanceof SplFileInfo) {
            if (false === $fileInfo->isDir()
                && false === $this->files->contains($file)
            ) {
                $this->files->add($file);
            }
            return true;
        }
        elseif (
            ($isArray = is_array($file)) ||
            $file instanceof Traversable
        ) {
            foreach ($file as $key => $f) {
                try {
                    $this->add($f);
                }
                catch (InvalidArgumentException $e) {
                    throw new UnexpectedValueException(
                        sprintf(
                            "%s's value at %s caused InvalidArgumentException",
                            is_numeric($key) ? 'index '.$key : "key '{$key}'",
                            $isArray ? 'Array' : 'FileBag',
                            $key
                        ),
                        null,
                        $e
                    );
                }
                catch (UnexpectedValueException $e) {
                    throw new UnexpectedValueException(
                        sprintf(
                            "%s's value at %s caused UnexpectedValueException",
                            is_numeric($key) ? 'index '.$key : "key '{$key}'",
                            $isArray ? 'Array' : 'FileBag',
                            $key
                        ),
                        null,
                        $e
                    );
                }
            }
            return true;
        }

        throw InvalidArgumentException::create(
            implode('|', array(
                'Axstrad\Component\Filesystem\FileBag',
                'SplFileInfo[]',
                'Axstrad\Component\Filesystem\File[]',
                'SplFileInfo',
                'Axstrad\Component\Filesystem\File'
            )),
            $file
        );
    }

    /**
     * {@inheritDoc}
     *
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
     * {@inheritDoc}
     *
     * @throws InvalidArgumentException If $file is not a valid value
     * @throws UnexpectedValueException If $file is an array or FileBag that
     *         contains a value that’s not a File or SplInfoObject object.
     */
    public function remove($file)
    {
        if (($isArray = is_array($file)) || $file instanceof Traversable) {
            $result = true;
            foreach ($file as $key => $f) {
                try {
                    if (!$this->remove($f)) {
                        $result = false;
                    }
                }
                catch (InvalidArgumentException $e) {
                    throw new UnexpectedValueException(
                        sprintf(
                            "%s's value at key %s caused InvalidArgumentException",
                            $isArray ? 'Array' : 'FileBag',
                            $key
                        ),
                        null,
                        $e
                    );
                }
                catch (UnexpectedValueException $e) {
                    throw new UnexpectedValueException(
                        sprintf(
                            "%s's value at key %s caused UnexpectedValueException",
                            $isArray ? 'Array' : 'FileBag',
                            $key
                        ),
                        null,
                        $e
                    );
                }
            }
            return $result;
        }
        elseif ($file instanceof SplFileInfo
            || $file instanceof File
        ) {
            if ($this->files->contains($file)) {
                $this->files->removeElement($file);
                return true;
            }
            return false;
        }

        throw InvalidArgumentException::create(
            implode('|', array(
                'Axstrad\Component\Filesystem\FileBag',
                'SplFileInfo[]',
                'Axstrad\Component\Filesystem\File[]',
                'SplFileInfo',
                'Axstrad\Component\Filesystem\File'
            )),
            $file
        );
    }

    /**
     * {@inheritDoc}
     *
     * @throws InvalidArgumentException If $file is not a valid value
     * @throws UnexpectedValueException If $file is an array or FileBag that
     *         contains a value that’s not a File or SplInfoObject object.
     */
    public function has($file)
    {
        if (($isArray = is_array($file)) || $file instanceof Traversable) {
            foreach ($file as $key => $f) {
                try {
                    if (!$this->has($f)) {
                        return false;
                    }
                }
                catch (InvalidArgumentException $e) {
                    throw new UnexpectedValueException(
                        sprintf(
                            "%s's value at key %s caused InvalidArgumentException",
                            $isArray ? 'Array' : 'FileBag',
                            $key
                        ),
                        null,
                        $e
                    );
                }
                catch (UnexpectedValueException $e) {
                    throw new UnexpectedValueException(
                        sprintf(
                            "%s's value at key %s caused UnexpectedValueException",
                            $isArray ? 'Array' : 'FileBag',
                            $key
                        ),
                        null,
                        $e
                    );
                }
            }
        }
        elseif ($file instanceof SplFileInfo
            || $file instanceof File
        ) {
            return $this->files->contains($file);
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
     */
    public function clear()
    {
        $this->files->clear();
        return $this;
    }

    /**
     */
    public function count()
    {
        return $this->files->count();
    }

    /**
     */
    public function isEmpty()
    {
        return $this->files->count() == 0;
    }

    /**
     */
    public function isNotEmpty()
    {
        return $this->files->count() > 0;
    }

    /**
     * {@inheritDoc}
     *
     * @uses remove
     */
    public function transfer($file, FileBagInterface $newBag)
    {
        if (!$this->files->contains($file)) {
            return false;
        }

        $this->remove($file);
        $newBag->add($file);
        return true;
    }

    /**
     * {@inheritDoc}
     *
     * @uses transfer
     */
    public function merge(FileBagInterface $fileBag)
    {
        foreach ($fileBag as $file) {
            $fileBag->transfer($file, $this);
        }
        return $this;
    }

    /**
     */
    public function matching(Criteria $criteria)
    {
        return $this->files->matching($criteria);
    }

    /**
     */
    public function toArray()
    {
        return $this->files->toArray();
    }

    /**
     */
    public function getIterator()
    {
        return $this->files->getIterator();
    }
}


