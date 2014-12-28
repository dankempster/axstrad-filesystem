<?php
namespace Axstrad\Component\Filesystem\Scanner;

use Axstrad\Component\Filesystem\Exception\ClassDoesNotExistException;
use Axstrad\Component\Filesystem\Exception\MissingDirectoryIteratorException;
use Axstrad\Component\Filesystem\FileBag\BaseBag;
use Axstrad\Component\Filesystem\ScannerIterates;


/**
 * Axstrad\Component\Filesystem\Scanner\BaseIteratorScanner
 *
 * Base scanner to get you started.
 */
class BaseIteratorScanner implements
    ScannerIterates
{
    const BAG_BASE = 'Axstrad\Component\Filesystem\FileBag\BaseBag';
    const BAG_FILE = 'Axstrad\Component\Filesystem\FileBag\FileBag';
    const BAG_INFO = 'Axstrad\Component\Filesystem\FileBag\SplFileInfoBag';


    use ScannerIteratesTrait;

    protected $bagType = self::BAG_BASE;

    protected $fileClass = null;


    /**
     * Get fileClass
     *
     * @return null|string
     * @see setFileClassname
     */
    public function getFileClassname()
    {
        return $this->fileClass;
    }

    /**
     * Set file classname
     *
     * If set, an instance of the class will be created for each file during
     * iteration. It is that object that will be added to the FileBag.
     *
     * @param null|string $classname The classname of the File objects to create
     * @return self
     * @see getFileClassname
     * @throws ClassDoesNotExistException If $classname does not exist.
     */
    public function setFileClassname($classname = null)
    {
        if ($classname === null){
            $this->fileClass = null;
        }
        elseif (!class_exists($classname)) {
            throw ClassDoesNotExistException::create($classname);
        }
        else {
            $this->fileClass = (string) $classname;
        }
        return $this;
    }

    /**
     * Get bagType
     *
     * @return string
     * @see setBagType
     */
    public function getBagType()
    {
        return $this->bagType;
    }

    /**
     * Set bagType
     *
     * @param  string $bagType
     * @return self
     * @see getBagType
     */
    public function setBagType($bagType)
    {
        $this->bagType = (string) $bagType;
        return $this;
    }

    /**
     * @return BaseBag
     */
    public function scan()
    {
        $this->throwExceptionIfNoIterator();

        $bagClassName = $this->getBagType();
        $fileBag = new $bagClassName;

        $fileClassname = $this->getFileClassname();

        foreach ($this->iterator as $file) {
            if ($fileClassname) {
                $file = new $fileClassname($file);
            }
            $fileBag->add($file);
        }
        return $fileBag;
    }
}


