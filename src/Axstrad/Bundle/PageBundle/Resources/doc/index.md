# Installation

## Update composer.json
```
"require": {
    ...
    "axstrad/axstrad": "dev-develop@dev"
}
```

## Update AppKernel.php
```
// ./app/AppKernel.php

$bundles = array(

    // AxstradPageBundle depends on
    new \Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
    new \Axstrad\Bundle\DoctrineExtensionsBundle\AxstradDoctrineExtensionsBundle(),

    // AxstradPageBundle
    new \Axstrad\Bundle\PageBundle\AxstradPageBundle(),
);
```

## Update config.yml
```
# ./app/config/config.yml

# Doctrine Configuration
doctrine:
    # ...other doctrine config...
    orm:
        # ...other orm config...
        mappings:
            axstrad_content:
                type: yml
                prefix: Axstrad\Component\Content\Orm
                dir: "%kernel.root_dir%/../vendor/axstrad/axstrad/src/Axstrad/Component/Content/config/Orm"
                alias: AxstradContent
                is_bundle: false
        filters:
            activatable:
                class: Axstrad\DoctrineExtensions\Activatable\Filter\OrmFilter
                enabled: true

# AxstradDoctrineExtensionsBundle
axstrad_doctrine_extensions:
    orm:
        default:
            activatable: true

# StofDoctrineExtensionsBundle
stof_doctrine_extensions:
    default_locale: %locale%
    orm:
        default:
            sluggable: true
```

## Update routing.yml
```
# ./app/config/routing.yml

axstrad_page:
    resource: '@AxstradPageBundle/Resources/config/routing.yml'
```

## Next
The bundle comes with a basic template, so you'll probably want to override them.

 * AxstradPageBundle:Default:index.html.twig : Renderes the page itself
 * AxstradPageBundle::layout.html.twig : Simple HTML structure
