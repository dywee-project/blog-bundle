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

    public function homepageListAction()
    {
        $articleRepository = $this->getDoctrine()->getRepository(Article::class);
        //TODO
    }

}
