<?php

namespace Coosos\TagBundle\Form\DataTransformer;

use Coosos\TagBundle\Entity\Tag;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;

class TagsTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * TagsTransformer constructor.
     * @param ObjectManager $manager
     */
    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param mixed $value
     * @return string
     */
    public function transform($value): string
    {
        return implode(",", $value);
    }

    /**
     * @param mixed $value
     * @return Tag[]
     */
    public function reverseTransform($value): array
    {
        $names = array_unique(array_filter(array_map('trim', explode(',', $value))));
        $tags = $this->manager->getRepository("CoososTagBundle:Tag")->findBy([
            "name" => $names
        ]);

        $newNames = array_diff($names, $tags);
        foreach ($newNames as $name) {
            $tag = new Tag();
            $tag->setName($name);
            $tags[] = $tag;
        }

        return $tags;
    }
}
