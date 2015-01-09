<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vyper\SiteBundle\Entity\Manga;


class MangaController extends Controller
{

    public function showMangaAction(Manga $manga)
    {
        $view = $this->container->get('saysa_view');
        $view
            ->set('manga', $manga)
            ->set('current_mangaanime', true)
        ;

        return $this->render('VyperSiteBundle:Manga:showManga.html.twig', $view->getView());
    }

    public function showAllAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        $view = $this->container->get('saysa_view');
        $magazines_per_page = $this->container->getParameter('magazines_per_page');

        $magazines = $em->getRepository('VyperSiteBundle:Magazine')->showAll($magazines_per_page, $page);

        $view
            ->set('current_magazine', true)
            ->set('magazines', $magazines)
            ->set('page', $page)
            ->set('total_magazines', ceil(count($magazines)/$magazines_per_page))
        ;

        return $this->render('VyperSiteBundle:Magazine:showAll.html.twig', $view->getView());
    }

}
