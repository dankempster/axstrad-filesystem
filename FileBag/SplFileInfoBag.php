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

namespace Axstrad\Component\Filesystem\FileBag;

use Axstrad\Component\Filesystem\File;
use Axstrad\Component\Filesystem\Exception\InvalidArgumentException;
use SplFileInfo;


/**
 * Axstrad\Component\Filesystem\FileBag\SplFileInfoBag
 *
 * Concrete implementation of {@see Axstrad\Component\Filesystem\FileBag
 * FileBag} for {@link http://php.net/manual/en/class.splfileinfo.php
 * SplFileInfo} objects.
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 */
class SplFileInfoBag extends BaseBag
{
    /**
     * Add one or more files to the bag.
     *
     * This method will traverse a collection tree recursivley adding all the
     * File obejects it finds.
     *
     * @param FileBag||SplFileInfo[]|SplFileInfo $file The File or
     *        collection of Files to add
     * @return boolean Always true.
     * @see set
     */
    public function add($file)
    {
        if ($file instanceof File) {
            throw InvalidArgumentException::create(
                sprintf(
                    '%1$s/FileBag|%1$s/File[]|%1$s/File',
                    __NAMESPACE__
                ),
                $file
            );
        }

        return parent::add($file);
    }
}


