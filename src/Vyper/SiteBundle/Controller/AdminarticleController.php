<?php
/**
 * Created by PhpStorm.
 * User: Saysa
 * Date: 10/08/14
 * Time: 13:55
 */

namespace Vyper\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vyper\SiteBundle\Entity\Article;

class AdminArticleController extends AdminCommonController {

    public function showArticlesAction(Request $request)
    {
        if(!$this->_secure($request) || !$this->_admin($request)) {

            return $this->redirect($this->generateUrl('login'));
        }

        $view = $this->container->get('saysa_view');

        // Get all the articles not deleted
        $articles  = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Article')->myFindAll();
        $themes    = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Theme')->myFindAll();

        $view->set('articles', $articles);
        $view->set("active_article", true);
        $view->set('themes', $themes);

        return $this->render('VyperSiteBundle:Adminarticle:showArticles.html.twig', $view->getView());
    }

    public function addArticleAction(Request $request)
    {
        $article = new Article();
        $article->setTitle("Miyavi laisse un message");
        $article->setDescription("desc.");
        $article->setText("Le corps du message");
        $article->setUser(1);
        $article->setHighlight(0);
        $article->setContinent(1);
        $article->setReleaseDate(new \DateTime('now'));
        $article->setReleaseTime(new \DateTime('now'));
        $article->setAuthor("kiyomi");
        $article->setType(1);

        $article->setLive(true);
        $article->setDeleted(false);
        $article->setCreated(new \DateTime('now'));
        $article->setmodified(new \DateTime('now'));

        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        return new Response();
    }
} 