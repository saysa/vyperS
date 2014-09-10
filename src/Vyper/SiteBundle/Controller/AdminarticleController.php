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
use Vyper\SiteBundle\Entity\Picture;
use Vyper\SiteBundle\Form\ArticleType;

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
        $view = $this->container->get('saysa_view');
        $article = new Article();
        $form = $this->createForm(new ArticleType, $article);

        if ($request->getMethod() == 'POST') {

            $form->submit($request);

            $picture     = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Picture')    ->find(9);
            $article->setUser(1);
            $article->setPicture($picture);

            if ($form->isValid()) {

                /*$articleType = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:ArticleType')->find(2);
                $continent   = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Continent')  ->find(1);
                $picture     = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Picture')    ->find(1);
                */
                $em = $this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush();



            }

        }

        $view->set('form', $form->createView());

        return $this->render('VyperSiteBundle:Adminarticle:addArticle.html.twig', $view->getView());
    }
} 