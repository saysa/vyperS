<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vyper\SiteBundle\Entity\Top;


class TopController extends Controller
{

    public function topMangasAction()
    {
        $em = $this->getDoctrine()->getManager();

        $top_manga  = $em->getRepository('VyperSiteBundle:Top')->topManga();
        foreach ($top_manga as $top) {
            $top->manga = $em->getRepository('VyperSiteBundle:Manga')->find($top->getItemId());
        }

        $view = $this->container->get('saysa_view');
        $view->set('top_mangas', $top_manga);

        return $this->render('VyperSiteBundle:Top:topMangas.html.twig', $view->getView());
    }
}
