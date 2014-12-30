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
 * Axstrad\Component\Filesystem\Scanner
 *
 * This is a simple interface for services to use when they just need to
 * typecase an object is a Scanner so they can just trigger it.
 *
 * If you need to ensure the {@see scan scan()} returns a particular type of
 * value, typecase against the concrete implementation or check out these other
 * interfaces:
 *
 *  - {@see Axstrad\Component\Filesystem\Scanner\BaseScanner BaseScanner}
 *    which returns an {@see Axstrad\Component\Filesystem\FileBag FileBag}
 *    object.
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 */
interface Scanner
{
    /**
     * @return mixed The results of the scan
     */
    public function scan();
}
