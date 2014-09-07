<?php
/**
 * Created by PhpStorm.
 * User: Saysa
 * Date: 10/08/14
 * Time: 13:55
 */

namespace Vyper\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Vyper\SiteBundle\Components\View\View;
use Vyper\SiteBundle\Entity\Theme;
use Vyper\SiteBundle\Form\Admin\AdminAddTheme;

class AdminThemeController extends AdminCommonController {

    public function deleteThemeAction(Theme $theme)
    {
        $theme_repository = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Theme');
        $theme = $theme_repository->findOneBy(array(
            "id" => $theme->getId()
        ));

        $em = $this->getDoctrine()->getManager();
        $em->remove($theme);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_show_articles'));
    }

    public function updateThemeAction(Request $request, Theme $theme)
    {
        if(!$this->_secure($request) || !$this->_admin($request)) {

            return $this->redirect($this->generateUrl('login'));
        }

        $view = new View();

        $theme_repository = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Theme');
        $theme = $theme_repository->findOneBy(array(
            "id" => $theme->getId()
        ));

        $form = $this->createFormBuilder($theme)
            ->add('title', 'text')
            ->getForm();

        if ('POST' === $request->getMethod()) {

            $form->handleRequest($request);

            $theme = $form->getData();

            $theme->setmodified(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->flush();

        }

        $view->set('theme', $theme);
        $view->set('form', $form->createView());

        return $this->render('VyperSiteBundle:Admintheme:updateTheme.html.twig', $view->getView());
    }

    public function addThemeAction(Request $request)
    {
        if(!$this->_secure($request) || !$this->_admin($request)) {

            return $this->redirect($this->generateUrl('login'));
        }

        $view = new View();
        $view->set("active_article", true);

        $theme = new Theme();

        $form = $this->createFormBuilder($theme)
            ->add('title', 'text')
            ->getForm();

        if ('POST' === $request->getMethod()) {

            $form->handleRequest($request);

            $theme = $form->getData();
            $theme->setLive(true);
            $theme->setShowInMenu(false);
            $theme->setDeleted(false);
            $theme->setCreated(new \DateTime('now'));
            $theme->setmodified(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($theme);
            $em->flush();

        }

        $view->set('form', $form->createView());

        return $this->render('VyperSiteBundle:Admintheme:addTheme.html.twig', $view->getView());
    }
} 