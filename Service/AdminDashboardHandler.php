<?php

namespace Dywee\BlogBundle\Service;

use Symfony\Component\Routing\Router;

class AdminDashboardHandler
{

    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function getDashboardElement()
    {
        $elements = array(
            'key' => 'blog',
            'boxes' => array(
                array(
                    'column' => 'col-md-6',
                    'type' => 'default',
                    'title' => 'article.dashboard.label',
                    'body' => array(
                        array(
                            'boxBody' => false,
                            'controller' => 'DyweeBlogBundle:Dashboard:table'
                        )
                    )
                )
            )
        );

        return $elements;
    }
}