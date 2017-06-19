<?php

namespace Coosos\TagBundle\Model\Taggable;

use Coosos\TagBundle\Entity\Tag;
use Doctrine\Common\Collections\ArrayCollection;

trait TaggableMethodsTrait
{
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

        $this->tags->remove($tag);

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
