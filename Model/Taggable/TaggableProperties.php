<?php

namespace Coosos\TagBundle\Model\Taggable;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

trait TaggableProperties
{

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Coosos\TagBundle\Entity\Tag", cascade={"persist"})
     */
    protected $tags;

}
