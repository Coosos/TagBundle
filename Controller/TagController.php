<?php

namespace Coosos\TagBundle\Controller;

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
        return new JsonResponse([]);
    }
}
