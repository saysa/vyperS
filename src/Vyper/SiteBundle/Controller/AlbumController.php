<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


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



}
