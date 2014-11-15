<?php
namespace Axstrad\Bundle\HttpFileUploadBundle\Model;

use Axstrad\Bundle\HttpFileUploadBundle\Exception\LogixException;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Axstrad\Bundle\HttpFileUploadBundle\Model\BaseFile
 */
class BaseFile implements
    File
{
    /**
     * @var string $path
     */
    protected $path;

    /**
     * @var null|UploadedFile
     */
    private $file;


    /**
     * @{inheritDoc}
     * @see setPath
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set the file's path
     *
     * @param string $path
     * @return self
     * @see getPath
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * Returns the file's absolute file path
     * @return null|string
     * @uses getPath
     * @uses getUploadRootDir
     */
    public function getAbsolutePath()
    {
        if ($this->getPath() !== null) {
            return $this->getUploadRootDir().DIRECTORY_SEPARATOR.$this->getPath();
        }
        return null;
    }

    /**
     * Get the absolute directory path where these document should be saved.
     *
     * @return string
     * @uses getUploadDir
     */
    protected function getUploadRootDir()
    {
        return
             __DIR__.str_repeat(DIRECTORY_SEPARATOR.'..', 4)
            .DIRECTORY_SEPARATOR.'web'
            .DIRECTORY_SEPARATOR.$this->getUploadDir()
        ;
    }

    /**
     * Get upload dir's web path.
     *
     * @return string
     */
    protected function getUploadDir()
    {
        return '/uploads/documents';
    }

    /**
     * Sets file.
     *
     * @param null|UploadedFile $file
     * @return self
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        return $this;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Moves the uploaded file to it's final location and sets this object's
     * path property.
     *
     * @return void
     */
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->getFile()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->setPath($this->getFile()->getClientOriginalName());

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }
}

