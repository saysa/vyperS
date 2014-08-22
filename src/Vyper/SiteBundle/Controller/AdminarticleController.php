<?php
/**
 * Created by PhpStorm.
 * User: Saysa
 * Date: 10/08/14
 * Time: 13:55
 */

namespace Vyper\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Vyper\SiteBundle\Components\View\View;

class AdminArticleController extends AdminCommonController {

    public function showArticlesAction(Request $request)
    {
        if(!$this->_secure($request) || !$this->_admin($request)) {

            return $this->redirect($this->generateUrl('login'));
        }

        $view = new View();

        // Get all the articles not deleted
        $articles = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Article')->myFindAll();

        $view->set('articles', $articles);
        $view->set("active_article", true);

        // Provisoire faire des liens Twig
        $view->set('themes', array());

        return $this->render('VyperSiteBundle:Adminarticle:showArticles.html.twig', $view->getView());
    }
} 