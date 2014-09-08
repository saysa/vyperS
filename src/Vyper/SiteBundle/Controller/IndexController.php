<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $view = $this->container->get('saysa_view');
        $session = $request->getSession();
        $user = $session->get('user');
        $view->set('user_id', $user);
        return $this->render('VyperSiteBundle:Index:index.html.twig', $view->getView());
    }

}
