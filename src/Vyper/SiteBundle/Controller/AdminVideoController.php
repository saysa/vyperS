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
use Vyper\SiteBundle\Entity\Video;
use Vyper\SiteBundle\Form\VideoType;

class AdminVideoController extends AdminCommonController {

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

    public function showVideosAction()
    {
        $view = $this->container->get('saysa_view');

        // Get all the articles not deleted
        $videos  = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Video')->myFindAll();
        $podcast_video  = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Podcast')->getVideo();
        $podcast_audio  = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Podcast')->getAudio();

        $view->set('videos',       $videos);
        $view->set('podcast_video',       $podcast_video);
        $view->set('podcast_audio',       $podcast_audio);
        $view->set("active_video", true);

        return $this->render('VyperSiteBundle:AdminVideo:showVideos.html.twig', $view->getView());
    }
} 