<?php

namespace Coosos\TagBundle\Model\Taggable;

use Coosos\TagBundle\Entity\Tag;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

trait TaggableTrait
{
    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Coosos\TagBundle\Entity\Tag", cascade={"persist"})
     */
    private $tags;

    /**
     * @param Tag $tag
     * @return $this
     */
    public function addTag(Tag $tag)
    {
        if (!$this->tags) { $this->tags = new ArrayCollection(); }

        $this->tags->add($tag);

        return $this;
    }

    /**
     * @param Tag $tag
     * @return $this
     */
    public function removeTag(Tag $tag)
    {
        if (!$this->tags) { $this->tags = new ArrayCollection($this->tags); }

        $this->tags->removeElement($tag);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTags()
    {
        return ($this->tags) ? $this->tags : new ArrayCollection();
    }
}
