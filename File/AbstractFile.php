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

namespace Axstrad\Component\Filesystem\File;

use Axstrad\Component\Filesystem\File;


/**
 * Axstrad\Component\Filesystem\File\AbstractFile
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 */
abstract class AbstractFile implements
    File
{
    /**
     * @var SplFileInfo
     */
    protected $info;


    /**
     * Get info
     *
     * @return SplFileInfo
     * @see setInfo
     */
    public function getInfo()
    {
        return $this->info;
    }
}
