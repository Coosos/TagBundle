<?php

namespace Coosos\TagBundle\Controller;

use Coosos\TagBundle\Entity\Tag;
use Coosos\TagBundle\Repository\TagRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class TagController
 * @package Coosos\TagBundle\Controller
 * @Route("/tag")
 */
class TagController extends Controller
{
    /**
     * @Route("/tag-list", name="coosos_tag_tag_tagList")
     * @Method("GET")
     * @param Request $request
     * @return Response
     */
    public function tagListAction(Request $request)
    {
        $searchTag = ($request->query->has("term")) ? $request->query->get("term") : null;
        $categoryTag = ($request->query->has("category")) ? $request->query->get("category") : "default";

        $em = $this->getDoctrine()->getManager();
        /** @var TagRepository $repository */
        $repository = $em->getRepository("CoososTagBundle:Tag");
        $results = $repository->getTagList($searchTag,  $categoryTag, 5);

        $tags = [];
        /** @var Tag $result */
        foreach ($results as $result) {
            $tags[] = $result->getName();
        }

        return new JsonResponse($tags, 200);
    }
}
