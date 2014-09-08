<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Vyper\SiteBundle\Components\View\View;
use Vyper\SiteBundle\Entity\Article;

class ArticleController extends Controller
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param Article $article
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showArticleAction(Request $request, Article $article)
    {
        $view = new View();
        $session = $request->getSession();
        $user = $session->get('user');

        $article  = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Article')->find($article->getId());

        $view->set('user_id', $user);
        $view->set('article', $article);


        return $this->render('VyperSiteBundle:Article:showArticle.html.twig', $view->getView());
    }

}
