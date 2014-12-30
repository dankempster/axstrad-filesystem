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

use SplFileInfo;
use Traversable;


/**
 * Axstrad\Component\Filesystem\File\BaseFile
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 */
class BaseFile extends AbstractFile
{
    /**
     * @param SplFileInfo $info
     */
    public function __construct(SplFileInfo $info)
    {
        if ($info instanceof Traversable) {
            $info = new SplFileInfo($info->getPathname());
        }
        $this->info = $info;
    }
}
