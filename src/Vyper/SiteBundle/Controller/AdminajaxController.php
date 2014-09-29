<?php
/**
 * Created by PhpStorm.
 * User: Saysa
 * Date: 10/08/14
 * Time: 13:55
 */

namespace Vyper\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAjaxController extends AdminCommonController {

    public function totoAction(Request $request)
    {
        $theme_repository = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Theme');
        $theme = $theme_repository->findOneBy(array(
            "id" => $_POST['theme_id']
        ));
        if ($_POST['checkboxValue'] == "true")
        {
            $theme->setshowInMenu(1);
        }
        else{
            $theme->setshowInMenu(0);
        }

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return new Response();
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function articleArtistLinkAction(Request $request)
    {
        $artist_id = $request->request->get('artist_id');
        if (isset($artist_id) && $artist_id != '-1') {

            $em = $this->getDoctrine()->getManager();
            $article = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Article')->find($request->request->get('item_id'));
            $artist  = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Artist')->find($artist_id);

            $article->addArtist($artist);
            $em->flush();
            $array = array("artist" => array("id" => $artist->getId(), "name" => $artist->getName()));
            echo json_encode($array);
        }
        return new Response();
    }

    public function articleArtistLinkDeleteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $artist_id = $request->request->get('artist_id');
        $article = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Article')->find($request->request->get('item_id'));
        $artist  = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Artist')->find($artist_id);

        $article->removeArtist($artist);
        $em->flush();

        return new Response();
    }

} 