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
use Vyper\SiteBundle\Entity\Top;

class AdminTopController extends AdminCommonController {

    public function addVideoAction(Request $request)
    {
        $view = $this->container->get('saysa_view');
        $tour = new Video;
        $form = $this->createForm(new VideoType, $tour);

        if ($request->getMethod() == 'POST') {

            $form->submit($request);
            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($tour);
                $em->flush();
            }
        }

        $view
            ->set('form', $form->createView())
            ->set('active_video', true)
        ;

        return $this->render('VyperSiteBundle:AdminVideo:addVideo.html.twig', $view->getView());
    }

    /**
     * @param Request $request
     * @param Video $video
     * @return \Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_AUTHOR')")
     */
    public function updateVideoAction(Request $request, Video $video)
    {
        $view = $this->container->get('saysa_view');

        $form = $this->createForm(new VideoType, $video);

        if ('POST' === $request->getMethod()) {

            $form->submit($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
            }

        }

        $view
            ->set('video', $video)
            ->set('active_video', true)
            ->set('form', $form->createView())
        ;

        return $this->render('VyperSiteBundle:AdminVideo:updateVideo.html.twig', $view->getView());
    }

    public function showTopsAction()
    {
        $view = $this->container->get('saysa_view');
        $em = $this->getDoctrine()->getManager();

        // Get all the articles not deleted
        $top_manga  = $em->getRepository('VyperSiteBundle:Top')->topManga();
        $mangas = $em->getRepository('VyperSiteBundle:Manga')->findAll();

        $view->set('top_manga',     $top_manga);
        $view->set('mangas',        $mangas);
        $view->set("active_video",  true);

        return $this->render('VyperSiteBundle:AdminTop:showTops.html.twig', $view->getView());
    }
} 