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
use Vyper\SiteBundle\Entity\Podcast;
use Vyper\SiteBundle\Form\PodcastType;

class AdminPodcastController extends AdminCommonController {

    public function addPodcastAction(Request $request)
    {
        $view = $this->container->get('saysa_view');
        $tour = new Podcast();
        $form = $this->createForm(new PodcastType, $tour);

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

        return $this->render('VyperSiteBundle:AdminPodcast:addPodcast.html.twig', $view->getView());
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


} 