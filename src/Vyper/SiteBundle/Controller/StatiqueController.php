<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Vyper\SiteBundle\Form\ContactForm;

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

    /**
     * @param Request $request
     * @return array
     * @Template
     */
    public function contactAction(Request $request)
    {
        $view = $this->container->get('saysa_view');

        $form = $this->createForm(new ContactForm);

        if ($request->getMethod() == 'POST') {

            $form->submit($request);
            if ($form->isValid()) {

                $sujet = $_POST['contact']['sujet'];
                $name = $_POST['contact']['name'];
                $societe = $_POST['contact']['societe'];
                $from = $_POST['contact']['email'];
                $msg = $_POST['contact']['message'];
                $dest = $_POST['objet'] . '@japanfm.fr';

                $corps = '
                Nom et prénom : ' . $name . '<br />
                Société : ' . $societe . '<br />
                Corps : <br />
                ' . $msg . '
                ';

                $message = \Swift_Message::newInstance()
                    ->setSubject($sujet)
                    ->setFrom($from)
                    ->setTo($dest)
                    ->setBody($corps, 'text/html');

                $this->get('mailer')->send($message);

                $request->getSession()->getFlashBag()->add('info', 'Merci, nous vous répondrons dans les meilleurs délais!');
            }

        }

        $view
            ->set('form', $form->createView())
        ;
        return $view->getView();
    }

    public function partenairesAction()
    {
        return $this->render('VyperSiteBundle:Statique:partenaires.html.twig');
    }

    public function cguAction()
    {
        return $this->render('VyperSiteBundle:Statique:cgu.html.twig');
    }

    /**
     * @return array
     * @Template
     */
    public function cguSmsAction()
    {
        return array();
    }

    /**
     * @return array
     * @Template
     */
    public function mentionsLegalesAction()
    {
        return array();
    }

}
