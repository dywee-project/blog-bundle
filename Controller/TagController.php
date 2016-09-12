<?php

namespace Dywee\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;


class TagController extends Controller
{
    public function tagsAction()
    {
        $tags = $this->getDoctrine()->getRepository('DyweeBlogBundle:ArticleTag')->findBy([], ['name' => 'ASC']);

        return $this->render('DyweeBlogBundle:Tags:tags.json.twig', ['tags' => $tags]);
    }
}
