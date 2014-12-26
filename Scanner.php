<?php
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
 */
interface Scanner
{
    /**
     * @return mixed The results of the scan
     */
    public function scan();
}
