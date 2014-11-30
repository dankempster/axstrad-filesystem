<?php

/*
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014 Elcodi.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author Aldo Chiecchia <zimage@tiscali.it>
 */

namespace Axstrad\Bundle\SeoBundle\Tests\Functional\app;

use Axstrad\Bundle\TestBundle\Functional\AbstractAxstradKernel;


/**
 * Class AppKernel
 */
class AppKernel extends AbstractAxstradKernel
{
    /**
     * Register application bundles
     *
     * @return array Array of bundles instances
     */
    public function registerBundles()
    {
        $bundles = array(
            // Minimum symfony app bundles
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),

            // Required for testing
            new \Symfony\Bundle\TwigBundle\TwigBundle(),
            new \Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new \Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            // Required for usage
            new \Sonata\SeoBundle\SonataSeoBundle(),
            new \Symfony\Cmf\Bundle\SeoBundle\CmfSeoBundle(),
            // new Burgov\Bundle\KeyValueFormBundle\BurgovKeyValueFormBundle(),

            // Axstrad Bundles
            new \Axstrad\Bundle\SeoBundle\AxstradSeoBundle(),
            new \Axstrad\Bundle\SeoBundle\Tests\Functional\AxstradTestSeoBundle(),
        );

        return $bundles;
    }

    /**
     * Gets the container class.
     *
     * @return string The container class
     */
    protected function getContainerClass()
    {
        return  $this->name .
                ucfirst($this->environment) .
                'DebugProjectContainerSeoBundle';
    }
}
