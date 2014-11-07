<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Vyper\SiteBundle\Components\NextEvent\NextEvent;
use Vyper\SiteBundle\Entity\Event;


class EventController extends Controller
{
    public function showAllAction()
    {
        $em = $this->getDoctrine()->getManager();
        $view = $this->container->get('saysa_view');

        $events = $em->getRepository('VyperSiteBundle:Event')->myFindAll();

        $json = array();
        foreach ($events as $event) {

            $type = $event->getType()->getName();
            switch ($type) {
                case "Concert":
                    $color = 'black';
                    break;
                case "Emission":
                    $color = '#F90';
                    break;
                default:
                    $color = 'red';
            }

            $date = $event->getDate()->format("Y-m-d");
            $time = $event->getTime()->format("H:i:s");

            $json[] = array(
                'title' => $event->getTitle(),
                'start' => $date.'T'.$time,
                'color' => $color
            );
        }



        $defaultDate = date('Y-m-d', time());

        $view
            ->set('current_magazine', true)
            ->set('events', json_encode($json))
            ->set('defaultDate', $defaultDate)
        ;

        return $this->render('VyperSiteBundle:Event:showAll.html.twig', $view->getView());
    }

    public function showEventAction(Request $request, Event $event)
    {
        $em = $this->getDoctrine()->getManager();

        $increment = $this->container->get('vpr_visit_increment');
        $increment->increment($event, $em);

        $view = $this->container->get('saysa_view');
        $view->set('event', $event);

        return $this->render('VyperSiteBundle:Event:showEvent.html.twig', $view->getView());
    }

    public function nextEventAction()
    {
        $em = $this->getDoctrine()->getManager();

        $event = $em->getRepository('VyperSiteBundle:Event')->nextEvent();
        $view = $this->container->get('saysa_view');

        if (sizeof($event) > 0) {

            $nextEvent = new NextEvent();
            $nextEvent->initialize(
                $event[0]->getDate()
            );

            foreach ($nextEvent->templateVar() as $template_var => $var)
            {
                $view->set($template_var, $var);
            }
            $view->set('nextEvent_event', $event[0]);

        }

        return $this->render('VyperSiteBundle:Event:nextEvent.html.twig', $view->getView());
    }

}


/**
 * Attempted to call method "getCountry" on class "Vyper\SiteBundle\Entity\Event" in /vagrant/public/local.dev/src/Vyper/SiteBundle/Controller/EventController.php line 42.
500 I
 */