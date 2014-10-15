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
        $em = $this->getDoctrine()->getManager();
        $view = $this->container->get('saysa_view');
        $session = $request->getSession();
        $user = $session->get('user');

        $articles_carousel = $em->getRepository('VyperSiteBundle:Article')->carousel();

        $type = $em->getRepository('VyperSiteBundle:ArticleType')->findBy(array('name' => 'News'));
        $latest_news = $em->getRepository('VyperSiteBundle:Article')->latestNews($type);
        $type = $em->getRepository('VyperSiteBundle:ArticleType')->findBy(array('name' => 'Manga/Anime'));
        $latest_manga = $em->getRepository('VyperSiteBundle:Article')->latestNews($type);
        $type = $em->getRepository('VyperSiteBundle:ArticleType')->findBy(array('name' => 'Jeux Vidéos'));
        $latest_jeux_videos = $em->getRepository('VyperSiteBundle:Article')->latestNews($type);
        $type = $em->getRepository('VyperSiteBundle:ArticleType')->findBy(array('name' => 'Culture'));
        $latest_culture = $em->getRepository('VyperSiteBundle:Article')->latestNews($type);


        $view
            ->set('articles_carousel', $articles_carousel)
            ->set('latest_news', $latest_news)
            ->set('latest_mangas', $latest_manga)
            ->set('latest_jeux_videos', $latest_jeux_videos)
            ->set('latest_culture', $latest_culture)
            ->set('front_page_index', true)
            ->set('user_id', $user)
        ;
        return $this->render('VyperSiteBundle:Index:index.html.twig', $view->getView());
    }

}
