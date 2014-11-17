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
                    $background = '#414140';
                    $border = '#272727';
                    break;
                case "Emission":
                    $background = '#D35F5F';
                    $border = '#891F1F';
                    break;
                default:
                    $background = '#A60000';
                    $border = '#6C0000';
            }

            $date = $event->getDate()->format("Y-m-d");
            $time = $event->getTime()->format("H:i:s");
            if (!is_null($event->getTimeEnd())) {
                $timeEnd = $event->getTimeEnd()->format("H:i:s");
            }

            $opt = array(
                'title' => $event->getTitle(),
                'start' => $date.'T'.$time,
                'borderColor' => $border,
                'backgroundColor' => $background,
                'description' => $event->getDescription(),
                'googlemap' => $event->getLocation()->getGooglemap(),
                'url' => $this->get('router')->generate('showEvent', array('id' => $event->getId(), 'slug' => $event->getSlug()))
            );
            if (isset($timeEnd)) {
                $opt['end'] = $date.'T'.$timeEnd;
            }

            $json[] = $opt;
        }



        $defaultDate = date('Y-m-d', time());

        $view
            ->set('current_event', true)
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