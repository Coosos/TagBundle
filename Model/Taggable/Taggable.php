<?php

namespace Coosos\TagBundle\Model\Taggable;

use Coosos\TagBundle\Model\Taggable as Tag;

trait Taggable {

    use Tag\TaggableProperties,
        Tag\TaggableMethods;

}
