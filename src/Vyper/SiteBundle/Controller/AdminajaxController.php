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
} 