<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ProgramController extends Controller
{


    public function showAllProgramTypesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $view = $this->container->get('saysa_view');

        $programTypes = $em->getRepository('VyperSiteBundle:ProgramType')->findAll();

        $view
            ->set('current_radio', true)
            ->set('programTypes', $programTypes)
        ;

        return $this->render('VyperSiteBundle:Program:showAllProgramTypes.html.twig', $view->getView());
    }

}
