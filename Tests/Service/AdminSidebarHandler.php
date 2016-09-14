<?php

namespace Dywee\BlogBundle\Service;

use Symfony\Component\Routing\Router;

class AdminSidebarHandler
{

    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function getSideBarMenuElement()
    {
        $menu = array(
            'key' => 'blog',
            'icon' => 'fa fa-leaf',
            'label' => 'article.sidebar.label',
            'children' => array(
                array(
                    'icon' => 'fa fa-list-alt',
                    'label' => 'article.sidebar.table',
                    'route' => $this->router->generate('article_table')
                ),
            )
        );

        return $menu;
    }
}