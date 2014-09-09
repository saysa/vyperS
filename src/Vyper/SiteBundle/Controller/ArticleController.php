<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
        $view = $this->container->get('saysa_view');
        $session = $request->getSession();
        $user = $session->get('user');

        $article  = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Article')->find($article->getId());

        $view->set('user_id', $user);
        $view->set('article', $article);


        return $this->render('VyperSiteBundle:Article:showArticle.html.twig', $view->getView());
    }

    public function showAllAction(Request $request, $page)
    {
        $view = $this->container->get('saysa_view');
        $articles_per_page = $this->container->getParameter('articles_per_page');
        $articles  = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Article')->showAll($articles_per_page, $page);

        $view
            ->set('articles', $articles)
            ->set('page', $page)
            ->set('total_articles', ceil(count($articles)/$articles_per_page))
        ;
        return $this->render('VyperSiteBundle:Article:showAll.html.twig', $view->getView());
    }

}
