<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vyper\SiteBundle\Form\Login\Login;
use Symfony\Component\HttpFoundation\Request;

class UsersController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(Request $request)
    {
        $form = $this->get('form.factory')->create(new Login());
        if ('POST' === $request->getMethod()) {

            $form->handleRequest($request);
            $data = $form->getData();
            var_dump($data);
        }



        return $this->render('VyperSiteBundle:Users:login.html.twig', array(
            'form' => $form->createView()
        ));
    }

}
