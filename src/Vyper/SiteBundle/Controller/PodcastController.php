<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;




class PodcastController extends Controller
{
    public function showAllAction()
    {
        $view = $this->container->get('saysa_view');
        $view
            ->set('current_radio', true)
        ;

        return $this->render('VyperSiteBundle:Podcast:showAll.html.twig', $view->getView());
    }
}
