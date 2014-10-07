<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vyper\SiteBundle\Entity\Album;


class AlbumController extends Controller
{
    public function recentPicturesAction()
    {

        $em = $this->getDoctrine()->getManager();
        $concert     = $em->getRepository('VyperSiteBundle:AlbumCategory')->findByName('concert');


        $view = $this->container->get('saysa_view');
        $pictures  = $em->getRepository('VyperSiteBundle:Picture')->showRandom($concert[0]);
        shuffle($pictures);
        $view->set('recent_pictures', $pictures);
        return $this->render('VyperSiteBundle:Album:recentPictures.html.twig', $view->getView());
    }

    public function showAlbumAction(Request $request, Album $album)
    {
        $em = $this->getDoctrine()->getManager();

        $increment = $this->container->get('vpr_visit_increment');
        $increment->increment($album, $em);

        $pictures  = $em->getRepository('VyperSiteBundle:Picture')->findBy(array('album' => $album->getId()));

        $view = $this->container->get('saysa_view');
        $view->set('pictures', $pictures);
        $view->set('album', $album);
        $view->set("img_type_news", "true");

        return $this->render('VyperSiteBundle:Album:showAlbum.html.twig', $view->getView());
    }

}
