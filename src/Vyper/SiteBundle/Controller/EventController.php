<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Vyper\SiteBundle\Entity\Event;


class EventController extends Controller
{

    public function showEventAction(Request $request, Event $event)
    {
        $em = $this->getDoctrine()->getManager();

        $increment = $this->container->get('vpr_visit_increment');
        $increment->increment($event, $em);

        $view = $this->container->get('saysa_view');
        $view->set('event', $event);

        return $this->render('VyperSiteBundle:Event:showEvent.html.twig', $view->getView());
    }

}
