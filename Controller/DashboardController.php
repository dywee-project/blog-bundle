<?php

namespace Dywee\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function tableAction()
    {
        $articles = $this->getDoctrine()->getRepository('DyweeBlogBundle:Article')->findBy(array(), array('updatedAt' => 'desc'), 0, 10);

        return $this->render('DyweeBlogBundle:Article:miniTable.html.twig', array('articles' => $articles));
    }
}