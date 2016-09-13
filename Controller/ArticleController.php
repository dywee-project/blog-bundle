<?php

namespace Dywee\BlogBundle\Controller;

use Dywee\BlogBundle\Entity\Article;
use Dywee\CoreBundle\Controller\ParentController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class ArticleController extends ParentController
{
    /**
     * @Route(name="article_view", path="article/{id}")
     */
    public function myViewAction(Article $object)
    {
        return parent::viewAction($object);
    }

    /**
     * @Route(name="article_update", path="admin/article/{id}/edit")
     */
    public function myUpdateAction(Article $object, Request $request)
    {
        return parent::updateAction($object, $request);
    }

    /**
     * @Route(name="article_table", path="admin/article")
     */
    public function myTableAction($parameters = null)
    {
        return parent::tableAction($parameters);
    }

    /**
     * @Route(name="article_add", path="admin/article/add")
     */
    public function myAddAction(Request $request)
    {
        return parent::addAction($request);
    }

    /**
     * @Route(name="article_delete", path="admin/article/{id}/delete")
     */
    public function myDeleteAction($object, Request $request)
    {
        return parent::deleteAction($object, $request);
    }


    /*
    public function listAction($itemByPage = 4)
    {
        $em = $this->getDoctrine()->getManager();
        $ar = $em->getRepository('DyweeBlogBundle:Article');
        $as = $ar->findBy(array('website' => $this->container->getParameter('website.id')), array('publicationDate' => 'DESC'), $itemByPage);
        return $this->render('DyweeBlogBundle:Blog:list.html.twig', array('articles' => $as));
    }

    public function pageListAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ar = $em->getRepository('DyweeBlogBundle:Article');
        $as = $ar->findBy(array('website' => $this->container->getParameter('website.id')), array('publicationDate' => 'DESC'), 10);
        return $this->render('DyweeBlogBundle:Blog:page-list.html.twig', array('articles' => $as));
    }

    public function footerAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ar = $em->getRepository('DyweeBlogBundle:Article');

        $as = $ar->findForFooter(5);

        return $this->render('DyweeBlogBundle:Blog:footer.html.twig', array('articles' => $as));
    }
    //*/

}
