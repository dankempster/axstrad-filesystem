# Installation

These instructions assumes you've already installed AxstradPageBundle.

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
    // ... your other bundles

    // Sonata Bundles and their requirements
    new Symfony\Bundle\SecurityBundle\SecurityBundle(),
    new Knp\Bundle\MenuBundle\KnpMenuBundle(),
    new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
    new Sonata\CoreBundle\SonataCoreBundle(),
    new Sonata\BlockBundle\SonataBlockBundle(),
    new Sonata\AdminBundle\SonataAdminBundle(),

    // AxstradPageAdminBundle
    new Axstrad\Bundle\PageAdminBundle\AxstradPageAdminBundle(),
);
```

## Update config.yml
```
# ./app/config/config.yml

# Menu Configuration
knp_menu:
    twig: true

# Sonata Block Bundle
sonata_block:
    default_contexts: [admin]
    blocks:
        # Enable the SonataAdminBundle block
        sonata.admin.block.admin_list:
            contexts: [admin]

# Sonata Admin Bundle
sonata_admin:
    extensions:
        cmf_seo.admin_extension:
            implements:
                - Symfony\Cmf\Bundle\SeoBundle\SeoAwareInterface
```

## Update routing.yml
```
# ./app/config/routing.yml

admin:
    resource: '@SonataAdminBundle/Resources/config/routing/sonata_admin.xml'
    prefix: /admin

_sonata_admin:
    resource: .
    type: sonata_admin
    prefix: /admin
```

## Next
The bundle comes with a basic template, so you'll probably want to override them.

 * AxstradPageAdminBundle:Default:index.html.twig : Renderes the page itself
 * AxstradPageAdminBundle::layout.html.twig : Simple HTML structure
