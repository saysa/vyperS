<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vyper\SiteBundle\Entity\Artist;

class ArtistController extends Controller
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param Artist $artist
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showArtistAction(Request $request, Artist $artist)
    {
        $em = $this->getDoctrine()->getManager();

        $increment = $this->container->get('vpr_visit_increment');
        $increment->increment($artist, $em);

        $view = $this->container->get('saysa_view');

        $artist  = $em->getRepository('VyperSiteBundle:Artist')->find($artist->getId());
        $articles   = $em->getRepository('VyperSiteBundle:Article')->getByArtist($artist);
        $events     = $em->getRepository('VyperSiteBundle:Event')->getByArtist($artist);
        $discos     = $em->getRepository('VyperSiteBundle:Disco')->getByArtist($artist, 3);
        $albums     = $em->getRepository('VyperSiteBundle:Album')->getByArtist($artist);

        foreach ($albums as $album)
        {
            $album->cover = $em->getRepository('VyperSiteBundle:Picture')->getByAlbum($album);
        }

        if (sizeof($articles)>0)    $view->set('articles', $articles);
        if (sizeof($events)>0)      $view->set('events', $events);
        if (sizeof($discos)>0)      $view->set('discos', $discos);
        if (sizeof($albums)>0)      $view->set('albums', $albums);

        $view
            ->set('artist', $artist)

        ;

        return $this->render('VyperSiteBundle:Artist:showArtist.html.twig', $view->getView());
    }

    public function showAllAction(Request $request, $page)
    {
        $view = $this->container->get('saysa_view');
        $articles_per_page = $this->container->getParameter('articles_per_page');
        $artists  = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Artist')->showAll($articles_per_page, $page);

        $view
            ->set('artists', $artists)
            ->set('page', $page)
            ->set('total_artists', ceil(count($artists)/$articles_per_page))
        ;
        return $this->render('VyperSiteBundle:Artist:showAll.html.twig', $view->getView());
    }

    public function showDiscoAction(Artist $artist)
    {
        $em = $this->getDoctrine()->getManager();
        $view = $this->container->get('saysa_view');
        $discos     = $em->getRepository('VyperSiteBundle:Disco')->getByArtist($artist);
        $view
            ->set('artist', $artist)
            ->set('discos', $discos)
        ;
        return $this->render('VyperSiteBundle:Artist:showDisco.html.twig', $view->getView());
    }

    public function recentArticlesAction()
    {
        $view = $this->container->get('saysa_view');
        $articles  = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Article')->showRecentArticles();
        $view->set('recent_articles', $articles);
        return $this->render('VyperSiteBundle:Article:recentArticles.html.twig', $view->getView());
    }

    public function popularArticlesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $view = $this->container->get('saysa_view');
        $results  = $em->getRepository('VyperSiteBundle:Visit')->showPopular();
        $popular_articles = array();
        foreach($results as $result) {
            $popular_articles[] = $result['item']->getArticle();
        }

        $view->set('popular_articles', $popular_articles);
        return $this->render('VyperSiteBundle:Article:popularArticles.html.twig', $view->getView());
    }

}
