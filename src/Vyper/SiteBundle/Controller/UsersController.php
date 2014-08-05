<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vyper\SiteBundle\Form\Login\Login;

class UsersController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction()
    {
        $form = $this->get('form.factory')->create(new Login());

        return $this->render('VyperSiteBundle:Users:login.html.twig', array(
            'form' => $form->createView()
        ));
    }

}
