<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Vyper\SiteBundle\Components\View\View;

class ArticleController extends Controller
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showArticleAction(Request $request)
    {
        $view = new View();
        $session = $request->getSession();
        $user = $session->get('user');
        $view->set('user_id', $user);
        return $this->render('VyperSiteBundle:Article:showArticle.html.twig', $view->getView());
    }

}
