# Coosos/TagBundle

_TagBundle is a bundle created from the 
[Grafikart video](https://www.grafikart.fr/tutoriels/symfony/tags-form-type-882)._

## Requirements

* PHP 7.0 and greater

## Installation

### Step 1 : Download the bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle :

    $ composer require coosos/tag-bundle
    
This command is used if composer is installed in your system.

### Step 2: Enable the Bundle

Then, enable the bundle by adding the following line in the ``app/AppKernel.php``
file of your project :

    // app/AppKernel.php
    // ...
    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                // ...
                new Coosos\TagBundle\CoososTagBundle(),
            );
            // ...
        }
        // ...
    }

### Step 3: Insert tag entity in your database 

Use this command to insert tag entity in your database

    $ php bin/console doctrine:schema:update -f
    
## Usage

### Form type

To create a field for tags, you must use a field type provided by the bundle

    use Coosos\TagBundle\Form\Type\TagsType;
    ...
    $builder->add("tags", TagsType::class)

### Twig Extension

Not yet available