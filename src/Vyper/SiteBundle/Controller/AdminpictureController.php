<?php
/**
 * Created by PhpStorm.
 * User: Saysa
 * Date: 10/08/14
 * Time: 13:55
 */

namespace Vyper\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Vyper\SiteBundle\Entity\Picture;
use Vyper\SiteBundle\Form\PictureType;

class AdminPictureController extends AdminCommonController {

    public function showPicturesAction(Request $request)
    {
        if(!$this->_secure($request) || !$this->_admin($request)) {

            return $this->redirect($this->generateUrl('login'));
        }

        $view = $this->container->get('saysa_view');

        // Get all the articles not deleted
        $pictures  = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Picture')->myFindAll();
        $albums    = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Album')  ->myFindAll();

        $view->set('albums',         $albums);
        $view->set('pictures',       $pictures);
        $view->set("active_article", true);

        return $this->render('VyperSiteBundle:Adminpicture:showPictures.html.twig', $view->getView());
    }

    public function addPictureAction(Request $request)
    {

        $view = $this->container->get('saysa_view');
        $picture = new Picture();
        $form = $this->createForm(new PictureType(), $picture);

        if ($request->getMethod() == 'POST') {

            $form->submit($request);

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($picture);
                $em->flush();
            }

        }

        $view->set('form', $form->createView());

        return $this->render('VyperSiteBundle:Adminpicture:addPicture.html.twig', $view->getView());
    }
} 