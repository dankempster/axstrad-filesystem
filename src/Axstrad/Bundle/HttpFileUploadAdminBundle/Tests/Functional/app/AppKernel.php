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

namespace Axstrad\Bundle\HttpFileUploadAdminBundle\Tests\Functional\app;

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

            // Symfony bundles
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            // new \Symfony\Bundle\MonologBundle\MonologBundle(),
            new \Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new \Symfony\Bundle\TwigBundle\TwigBundle(),

            // Doctrine bundles
            new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new \Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),

            // Sonata & Dependancies
            new \Sonata\CoreBundle\SonataCoreBundle(),
            new \Sonata\BlockBundle\SonataBlockBundle(),
            new \Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new \Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new \Sonata\AdminBundle\SonataAdminBundle(),

            // Helper bundles - help write test code quicker
            new \Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            // Axstrad Bundles
            new \Axstrad\Bundle\HttpFileUploadBundle\AxstradHttpFileUploadBundle(),
            new \Axstrad\Bundle\HttpFileUploadAdminBundle\AxstradHttpFileUploadAdminBundle(),
            new \Axstrad\Bundle\HttpFileUploadAdminBundle\Tests\Functional\AxstradTestHttpFileUploadAdminBundle(),
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
                'DebugProjectContainerOrmRepositoryFactory';
    }
}
