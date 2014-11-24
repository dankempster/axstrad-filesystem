<?php
/**
 * This file is part of the Axstrad library.
 *
 * (c) Dan Kempster <dev@dankempster.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @package Axstrad\Common
 * @subpackage Traits
 */
namespace Axstrad\Component\Filesystem\Tests;

use Axstrad\Component\Filesystem\FilesystemAwareTrait;


/**
 * Axstrad\Component\Filesystem\Tests\FilesystemAwareTestClass
 */
class FilesystemAwareTestClass
{
    use FilesystemAwareTrait {
        FilesystemAwareTrait::getFilesystem as public;
    }
}
