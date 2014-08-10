<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Vyper\SiteBundle\Components\View\View;

class IndexController extends Controller
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $view = new View();
        $session = $request->getSession();
        $user = $session->get('user');
        $view->set('user_id', $user);
        return $this->render('VyperSiteBundle:Index:index.html.twig', $view->getView());
    }

}
