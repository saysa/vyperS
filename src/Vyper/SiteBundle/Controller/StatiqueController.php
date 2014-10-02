<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StatiqueController extends Controller
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function aProposAction(Request $request)
    {
        $view = $this->container->get('saysa_view');
        $session = $request->getSession();
        $user = $session->get('user');
        $view
            ->set('user_id', $user)
            ->set('soe_title', 'A propos')
        ;

        return $this->render('VyperSiteBundle:Statique:aPropos.html.twig', $view->getView());
    }

    public function contactAction(Request $request)
    {
        $view = $this->container->get('saysa_view');
        $session = $request->getSession();
        $user = $session->get('user');
        $view
            ->set('user_id', $user)
            ->set('soe_title', 'Contact')
        ;

        return $this->render('VyperSiteBundle:Statique:contact.html.twig', $view->getView());
    }

}
