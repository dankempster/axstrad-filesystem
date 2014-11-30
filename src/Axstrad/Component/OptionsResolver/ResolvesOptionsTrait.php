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
 * @package Axstrad\OptionsResolver
 */
namespace Axstrad\Component\OptionsResolver;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


/**
 * Axstrad\Component\OptionsResolver\ResolvesOptionsTrait
 */
trait ResolvesOptionsTrait
{
    /**
     * @param array $options The options to resolve
     * @return array The resolved options
     *
     * @uses configureOptions To configure the options resolved
     */
    public function resolveOptions(array $options = array())
    {
        $resolver = new OptionsResolver;
        $this->configureOptions($resolver);
        return $resolver->resolve($options);
    }

    /**
     * Define this method to configure the OptionsResolver.
     *
     * @param  OptionsResolverInterface $resolver
     * @return void
     */
    abstract protected function configureOptions(OptionsResolverInterface $resolver);
}
