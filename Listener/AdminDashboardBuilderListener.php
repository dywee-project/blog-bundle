<?php

namespace Dywee\BlogBundle\Listener;

use Dywee\CoreBundle\DyweeCoreEvent;
use Dywee\CoreBundle\Event\DashboardBuilderEvent;
use Dywee\BlogBundle\Service\AdminDashboardHandler;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class AdminDashboardBuilderListener implements EventSubscriberInterface{
    private $adminDashboardHandler;

    public function __construct(AdminDashboardHandler $adminDashboardHandler)
    {
        $this->adminDashboardHandler = $adminDashboardHandler;
    }

    public static function getSubscribedEvents()
    {
        // return the subscribed events, their methods and priorities
        return array(
            DyweeCoreEvent::BUILD_ADMIN_DASHBOARD => array('addElementToDashboard', 1024)
        );
    }

    public function addElementToDashboard(DashboardBuilderEvent $adminDashboardBuilderEvent)
    {
        $adminDashboardBuilderEvent->addElement($this->adminDashboardHandler->getDashboardElement());
    }

}