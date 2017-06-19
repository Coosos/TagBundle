<?php

namespace Coosos\TagBundle\Tests\Form\DataTransformer;

use Coosos\TagBundle\Entity\Tag;
use Coosos\TagBundle\Form\DataTransformer\TagsTransformer;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityRepository;
use PHPUnit\Framework\TestCase;

class TagsTransformerTest extends TestCase
{
    /**
     */
    public function testCreateTagsArrayFromString()
    {
        $tags = $this
            ->getMockedTransformer()
            ->reverseTransform("Application, Demo");

        $this->assertCount(2, $tags);
        $this->assertSame("Demo", $tags[1]->getName());
    }

    /**
     */
    public function testUseAlreadyDefinedTag()
    {
        $tag = new Tag();
        $tag->setName("Application");

        $tags = $this
            ->getMockedTransformer([$tag])
            ->reverseTransform("Application, Demo");

        $this->assertCount(2, $tags);
        $this->assertSame($tag, $tags[0]);
    }

    /**
     */
    public function testRemoveEmptyTag()
    {
        $tags = $this
            ->getMockedTransformer()
            ->reverseTransform("Application, Demo, ,, Post");

        $this->assertCount(3, $tags);
        $this->assertSame("Demo", $tags[1]->getName());
    }

    /**
     */
    public function testRemoveDuplicateTag()
    {
        $tags = $this
            ->getMockedTransformer()
            ->reverseTransform("Application, Demo, Post, Demo");

        $this->assertCount(3, $tags);
        $this->assertSame("Demo", $tags[1]->getName());
    }

    /**
     */
    public function testDifferentCaseTag()
    {
        $tags = $this
            ->getMockedTransformer()
            ->reverseTransform("Application, Demo, Post, demo");

        $this->assertCount(4, $tags);
        $this->assertSame("Demo", $tags[1]->getName());
        $this->assertSame("demo", $tags[3]->getName());
    }

    /**
     * @param array $result
     * @return TagsTransformer
     */
    private function getMockedTransformer($result = [])
    {
        $tagRepository = $this
            ->getMockBuilder(EntityRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $tagRepository
            ->expects($this->any())
            ->method("findBy")
            ->will($this->returnValue($result));

        $entityManager = $this
            ->getMockBuilder(ObjectManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $entityManager
            ->expects($this->any())
            ->method("getRepository")
            ->will($this->returnValue($tagRepository));

        $options = [
            "coosos_tag_auto_complete"  => true,
            "coosos_tag_persist_new"    => true,
            "coosos_tag_category"       => "default",
        ];

        /** @noinspection PhpParamsInspection */
        return new TagsTransformer($entityManager, $options);
    }
}
