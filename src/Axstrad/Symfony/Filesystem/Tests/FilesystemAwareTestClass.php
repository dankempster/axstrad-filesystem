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
namespace Axstrad\Symfony\Filesystem\Tests;

use Axstrad\Symfony\Filesystem\FilesystemAwareTrait;


/**
 * Axstrad\Symfony\Filesystem\Tests\FilesystemAwareTestClass
 */
class FilesystemAwareTestClass
{
    use FilesystemAwareTrait {
        FilesystemAwareTrait::getFilesystem as public;
    }
}
