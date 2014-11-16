<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vyper\SiteBundle\Entity\Vote;


class AjaxController extends Controller
{
    public function votePictureAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $item_id    = $request->request->get('item_id');
        $mark       = $request->request->get('mark');
        $ip         = $_SERVER['REMOTE_ADDR'];

        $picture = $em->getRepository('VyperSiteBundle:Picture')->find($item_id);



        if ($em->getRepository('VyperSiteBundle:Vote')->ipAlreadyVoted($picture) == false) {

            $vote = new Vote();
            $vote->setIp($ip);
            $vote->setMark($mark);
            $vote->setPicture($picture);

            $em->persist($vote);
            $em->flush();
        }

        return new Response();
    }
}
