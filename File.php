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

namespace Axstrad\Component\Filesystem;


/**
 * Axstrad\Component\Filesystem\FileBag
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 */
interface File
{
    /**
     * Returns the file's info
     *
     * @return SplFileInfo
     */
    public function getInfo();
}
