# Coosos/TagBundle

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/15b5ca2c-ff07-46e0-b258-da8218961e12/mini.png)](https://insight.sensiolabs.com/projects/15b5ca2c-ff07-46e0-b258-da8218961e12)

_TagBundle is a bundle created from the 
[Grafikart video](https://www.grafikart.fr/tutoriels/symfony/tags-form-type-882)._

## Requirements

* Symfony 3.0 and greater
* PHP 7.0 and greater
* [jQuery tagEditor](https://github.com/Pixabay/jQuery-tagEditor) (require for twig extension)
* [jQuery UI Autocomplete](https://jqueryui.com/autocomplete/) (require for auto completion)

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
    $builder->add("tags", TagsType::class);
    
#### Options

##### Configuration list

<table>
    <thead>
        <tr>
            <th align="left">Config name</th>
            <th align="left">Default value</th>
            <th align="left">Values</th>
            <th align="left">Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>coosos_tag_auto_complete</td>
            <td>true</td>
            <td>true | false</td>
            <td>If you want to use auto completion</td>
        </tr>
        <tr>
            <td>coosos_tag_persist_new</td>
            <td>true</td>
            <td>true | false</td>
            <td>If you want the tags not exist is created</td>
        </tr>
        <tr>
            <td>coosos_tag_category</td>
            <td>"default"</td>
            <td>string</td>
            <td>If you want to separate tags in different categories</td>
        </tr>
    </tbody>
</table>

##### Usage

    $builder->add("tags", TagsType::class, [
        ...,
        "coosos_tag_auto_complete"  => false,
        "coosos_tag_persist_new"    => false,
        "coosos_tag_category"       => "House"
    ]);

##### Auto complete

The auto completion uses the library [jQuery UI Autocomplete](https://jqueryui.com/autocomplete/)

### TagsType - Form custom template

You must have [jQuery tagEditor](https://github.com/Pixabay/jQuery-tagEditor) installed

    twig:
        form_themes:
            - "CoososTagBundle:Form:fields.html.twig"


### Twig Extension

Using the twig function, you must have [jQuery tagEditor](https://github.com/Pixabay/jQuery-tagEditor) installed

    {{ form_coosos_tag(form.tags) }}
