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
namespace Axstrad\Component\OptionsResolver\Tests;

use Axstrad\Component\OptionsResolver\OptionsResolverTrait;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


/**
 * Axstrad\Component\OptionsResolver\Tests\ResolvesOptionsTestClass
 */
class ResolvesOptionsTestClass extends ResolvesOptionsAbstractTestClass
{
    protected function configureOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(array(
            'foo'
        ));
    }
}
