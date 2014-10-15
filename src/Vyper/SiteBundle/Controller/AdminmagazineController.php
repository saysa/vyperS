<?php
/**
 * Created by PhpStorm.
 * User: Saysa
 * Date: 10/08/14
 * Time: 13:55
 */

namespace Vyper\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Vyper\SiteBundle\Entity\Magazine;
use Vyper\SiteBundle\Form\MagazineType;

class AdminMagazineController extends AdminCommonController {

    public function addMagazineAction(Request $request)
    {
        $view = $this->container->get('saysa_view');
        $magazine = new Magazine;
        $form = $this->createForm(new MagazineType, $magazine);

        if ($request->getMethod() == 'POST') {

            $post_data = $request->request->get('vyper_sitebundle_magazine');

            $form->submit($request);

            $picture = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Picture')->find($post_data['pictureID']);

            $magazine->setPicture($picture);

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($magazine);
                $em->flush();
            }

        }

        $view
            ->set('form', $form->createView())
            ->set('active_magazine', true)
        ;

        return $this->render('VyperSiteBundle:Adminmagazine:addMagazine.html.twig', $view->getView());
    }

    /**
     * @param Request $request
     * @param Disco $disco
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_AUTHOR')")
     */
    public function updateDiscoAction(Request $request, Disco $disco)
    {
        $view = $this->container->get('saysa_view');

        $form = $this->createForm(new DiscoType, $disco);

        if ('POST' === $request->getMethod()) {

            $post_data = $request->request->get('vyper_sitebundle_disco');

            $form->submit($request);

            $picture = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Picture')->find($post_data['pictureID']);

            $disco->setPicture($picture);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
            }

        }

        $artists  = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Artist')->myFindAll();
        $titles   = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Title')->findBy(
            array('disco' => $disco)
        );


        $view
            ->set('disco', $disco)
            ->set('artists', $artists)
            ->set('titles', $titles)
            ->set('active_disco', true)
            ->set('form', $form->createView())
        ;

        return $this->render('VyperSiteBundle:Admindisco:updateDisco.html.twig', $view->getView());
    }

    public function showMagazinesAction()
    {
        $view = $this->container->get('saysa_view');

        // Get all the articles not deleted
        $magazines  = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Magazine')->myFindAll();

        $view->set('magazines',       $magazines);
        $view->set("active_magazine", true);

        return $this->render('VyperSiteBundle:Adminmagazine:showMagazines.html.twig', $view->getView());
    }
} 