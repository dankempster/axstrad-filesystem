<?php

namespace Axstrad\Bundle\SeoBundle;

use Axstrad\Bundle\SeoBundle\DependencyInjection\CompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AxstradSeoBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new CompilerPass\ConfigureSonataAdminPass());
    }
}
