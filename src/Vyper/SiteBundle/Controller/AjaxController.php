<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vyper\SiteBundle\Entity\Vote;


class AjaxController extends Controller
{
    public function ajaxAction(Request $request)
    {
        $response=null;
        if ($request->isXmlHttpRequest()) {
            $string_route = $request->request->get('cid');
            if (preg_match('!/events$!', $string_route)) {
                return $this->forward('VyperSiteBundle:Event:showAll');
            } elseif (preg_match('!/podcasts$!', $string_route)) {
                return $this->forward('VyperSiteBundle:Podcast:showAll');
            } elseif (preg_match('!/artistes!', $string_route)) {
                return $this->forward('VyperSiteBundle:Artist:showAll', array('page' => 1));
            }

        } else {
            echo "normal";
        }

        return new Response($response);
    }

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

    public function getPlaylistAction()
    {
        $filename = "http://japanfm.fr/playlist/playlist.xml";
        $playlistXML = simplexml_load_file($filename);

        $playlist = array();
        foreach ($playlistXML->xpath('//song') as $line) {
            $playlist[] = array(
                "title" => (string) $line->title,
                "artist" => (string) $line->artist,
            );
        }
        echo json_encode($playlist);
        return new Response();
    }
}
