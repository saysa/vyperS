<?php
/**
 * Created by PhpStorm.
 * User: Saysa
 * Date: 10/08/14
 * Time: 13:55
 */

namespace Vyper\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Vyper\SiteBundle\Entity\Article;
use Vyper\SiteBundle\Form\ArticleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class AdminArticleController extends AdminCommonController {


    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_AUTHOR')")
     */
    public function showArticlesAction(Request $request)
    {


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

            $post_data = $request->request->get('vyper_sitebundle_article');

            $form->submit($request);

            $picture = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Picture')->find($post_data['pictureID']);
            $article->setUser($this->getUser());
            $article->setPicture($picture);

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush();
            }

        }

        $view->set('form', $form->createView());

        return $this->render('VyperSiteBundle:Adminarticle:addArticle.html.twig', $view->getView());
    }

    /**
     * @param Request $request
     * @param Article $article
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_AUTHOR')")
     */
    public function updateArticleAction(Request $request, Article $article)
    {
        $view = $this->container->get('saysa_view');

        $form = $this->createForm(new ArticleType, $article);

        if ('POST' === $request->getMethod()) {

            $post_data = $request->request->get('vyper_sitebundle_article');

            $form->submit($request);

            $picture = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Picture')->find($post_data['pictureID']);

            $article->setPicture($picture);

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->flush();
            }

        }

        $artists  = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Artist')->myFindAll();

        $view
            ->set('article', $article)
            ->set('artists', $artists)
            ->set('active_article', true)
            ->set('form', $form->createView())
        ;

        return $this->render('VyperSiteBundle:Adminarticle:updateArticle.html.twig', $view->getView());
    }
} 