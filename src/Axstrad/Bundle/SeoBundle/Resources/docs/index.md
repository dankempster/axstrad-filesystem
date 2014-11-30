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
    // ... your other bundles

    // requires
    new \Sonata\SeoBundle\SonataSeoBundle(),
    new \Symfony\Cmf\Bundle\SeoBundle\CmfSeoBundle(),

    // AxstradSeoBundle
    new \Axstrad\Bundle\SeoBundle\AxstradSeoBundle(),
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
        filters:
            CmfSeoBundle: # Required by AxstradSeoBundle
                type: xml
                prefix: Symfony\Cmf\Bundle\SeoBundle\Model
                dir: Resources/config/doctrine-model

## Symfony SEO Bundle : extends Sonata SEO Bundle
# required by AxstradSeoBundle
cmf_seo:
    content_key: document
    persistence:
        orm: true
    # Standard page title
    title: "%%content_title%% | Acme App"

## Sonata SEO Bundle
# required by SymfonySEOBundle
sonata_seo:
    page:
        title: Acme App
        metas:
            name:
                robots: "index, follow"
            http-equiv:
                'Content-Type': "text/html; charset=utf-8"
                'X-Ua-Compatible': "IE=Edge"
        head:
            'xmlns': "http://www.w3.org/1999/xhtml"
```

# Usage


