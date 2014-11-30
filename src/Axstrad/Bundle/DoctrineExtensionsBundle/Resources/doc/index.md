Provides integration for Axstrad\DoctrineExtensions for your Symfony2 Project.

# Features
- __Activatable__ - only load entities if they're "active"

# Installation

## Update composer.json
```
"require": {
    ...
    "axstrad/doctrine-extensions-bundle": "dev-develop@dev"
}
```
## Update AppKernel.php
```
// Minimum required
new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle()

// AxstradDoctrineExtensionsBundle
new \Axstrad\Bundle\DoctrineExtensionsBundle\AxstradDoctrineExtensionsBundle(),
```

# Usage

## Activatable

### Configuration
Update your config.yml
```
doctrine:
    ...other doctrine config...
    orm:
        ...other orm config...
        filters:
            activatable:
                class: Axstrad\DoctrineExtensions\Activatable\Filter\OrmFilter
                enabled: true

axstrad_doctrine_extensions:
    orm:
        default:
            activatable: true
```

### Set Up Entity
Simply add the Activatable annotation to you entity's class docblock and define a boolean property to use as the "active" field.
```
// ./src/Acme/DemoBundle/Entity/Page

use Axstrad\DoctrineExtensions\Mapping\Annotation as Axstrad;

/**
 * ...your other annotations and documentation...
 * @Axstrad\Activatable(fieldName="active")
 */
 class Page
 {
    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    protected $active;

    // the rest of your class' code
 }
```

To help you along, I've included various abstract classes and traits. See example uses below.

#### Extending a base class
Axstrad\DoctrineExtensions provides an abstract class you can use; Which defines the $activte property and a get and set method.
```
// ./src/Acme/DemoBundle/Entity/Page

use Axstrad\DoctrineExtensions\Activatable\ActivatableEntity;
use Axstrad\DoctrineExtensions\Mapping\Annotation as Axstrad;

/**
 * @Axstrad\Activatable(fieldName="active")
 * ...your other annotations and documentation...
 */
class Page extends ActivatableEntity
{
    // Your class' code
}
```

#### Using a trait
Axstrad\DoctrineExtensions also provides a trait. Like the abstract class it defines the $activte property and a get and set method.
```
// ./src/Acme/DemoBundle/Entity/Page

use Axstrad\DoctrineExtensions\Activatable\ActivatableEntity;
use Axstrad\DoctrineExtensions\Mapping\Annotation as Axstrad;

/**
* @Axstrad\Activatable(fieldName="active")
* ...your other annotations and documentation...
*/
class Page
{
    use ActivatableTrait;

    // Your class' code
}
```
