<?php
namespace Axstrad\Component\Filesystem\FileBag;

use Axstrad\Component\Filesystem\Traits;
use Axstrad\Component\Filesystem\FileBag as FileBagInterface;


/**
 * Axstrad\Component\Filesystem\FileBag\FileBag
 *
 * Concrete implementation of {@see Axstrad\Component\Filesystem\FileBag
 * FileBag}.
 */
class FileBag implements
    FileBagInterface
{
    use Traits\FileBagTrait;
}


