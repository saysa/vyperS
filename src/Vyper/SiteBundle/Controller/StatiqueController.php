<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StatiqueController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function aProposAction()
    {
        return $this->render('VyperSiteBundle:Statique:aPropos.html.twig');
    }

    public function lEquipeAction()
    {
        return $this->render('VyperSiteBundle:Statique:lEquipe.html.twig');
    }

    public function contactAction()
    {
        return $this->render('VyperSiteBundle:Statique:contact.html.twig');
    }

    public function partenairesAction()
    {
        return $this->render('VyperSiteBundle:Statique:partenaires.html.twig');
    }

    public function cguAction()
    {
        return $this->render('VyperSiteBundle:Statique:cgu.html.twig');
    }

}
