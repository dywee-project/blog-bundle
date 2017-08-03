<?php

namespace Dywee\BlogBundle\Listener;

use Dywee\BlogBundle\Service\AdminSidebarHandler;
use Dywee\CoreBundle\DyweeCoreEvent;
use Dywee\CoreBundle\Event\SidebarBuilderEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class AdminSidebarBuilderListener implements EventSubscriberInterface
{
    /** @var AdminSidebarHandler  */
    private $adminSidebarHandler;

    /**
     * AdminSidebarBuilderListener constructor.
     *
     * @param AdminSidebarHandler $adminSidebarHandler
     */
    public function __construct(AdminSidebarHandler $adminSidebarHandler)
    {
        $this->adminSidebarHandler = $adminSidebarHandler;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        // return the subscribed events, their methods and priorities
        return [
            DyweeCoreEvent::BUILD_ADMIN_SIDEBAR => ['addElementToSidebar', -10]
        ];
    }

    /**
     * @param SidebarBuilderEvent $sidebarBuilderEvent
     */
    public function addElementToSidebar(SidebarBuilderEvent $sidebarBuilderEvent)
    {
        $sidebarBuilderEvent->addElement($this->adminSidebarHandler->getSideBarMenuElement());
    }

}