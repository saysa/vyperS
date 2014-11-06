<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vyper\SiteBundle\Entity\Article;

class ArticleController extends Controller
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param Article $article
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showArticleAction(Request $request, Article $article)
    {
        $em = $this->getDoctrine()->getManager();

        $increment = $this->container->get('vpr_visit_increment');
        $increment->increment($article, $em);

        $view = $this->container->get('saysa_view');
        $session = $request->getSession();
        $user = $session->get('user');

        $article  = $em->getRepository('VyperSiteBundle:Article')->find($article->getId());
        $article_type = $article->getArticleType()->getName();
        $big_format_picture = $this->container->getParameter('big_format_picture');
        if (in_array($article_type, $big_format_picture)) {
            $view->set("img_type_big", "true");
        } else {
            $view->set("img_type_news", "true");
        }

        $view->set('user_id', $user);
        $view->set('article', $article);

        return $this->render('VyperSiteBundle:Article:showArticle.html.twig', $view->getView());
    }

    public function showAllAction(Request $request, $page, $type)
    {
        $em = $this->getDoctrine()->getManager();
        $view = $this->container->get('saysa_view');
        $articles_per_page = $this->container->getParameter('articles_per_page');

        switch($type) {

            case "musique-news":
                $type = array(
                    '',
                    $em->getRepository('VyperSiteBundle:ArticleType')->findByName("musique : chronique"),
                    $em->getRepository('VyperSiteBundle:ArticleType')->findByName("musique : interview"),
                    $em->getRepository('VyperSiteBundle:ArticleType')->findByName("musique : live report"),
                    $em->getRepository('VyperSiteBundle:ArticleType')->findByName("musique : news"),
                );
                $view
                    ->set('article_type', "Musique")
                    ->set('current_musique', true)
                ;
                break;
            case "musique-interviews":
                $type = $em->getRepository('VyperSiteBundle:ArticleType')->findByName("musique : interview");
                $view
                    ->set('article_type', "Interviews")
                    ->set('current_musique', true)
                ;
                break;
            case "musique-live-reports":
                $type = $em->getRepository('VyperSiteBundle:ArticleType')->findByName("musique : live report");
                $view
                    ->set('article_type', "Live Reports")
                    ->set('current_musique', true)
                ;
                break;
            case "musique-chroniques":
                $type = $em->getRepository('VyperSiteBundle:ArticleType')->findByName("musique : chronique");
                $view
                    ->set('article_type', "Chroniques")
                    ->set('current_musique', true)
                ;
                break;
            case "manga-anime":
                $type = $em->getRepository('VyperSiteBundle:ArticleType')->findByName("Manga/Anime");
                $view
                    ->set('article_type', "Manga/Anime")
                    ->set('current_mangaanime', true)
                ;
                break;
            case "jeux-videos":
                $type = $em->getRepository('VyperSiteBundle:ArticleType')->findByName("Jeux Vidéos");
                $view
                    ->set('article_type', "Jeux Vidéos")
                    ->set('current_jeuxvideos', true)
                ;
                break;
            case "culture":
                $type = $em->getRepository('VyperSiteBundle:ArticleType')->findByName("Culture");
                $view
                    ->set('article_type', "Culture")
                    ->set('current_culture', true)
                ;
                break;
            case "news":
                $type = $em->getRepository('VyperSiteBundle:ArticleType')->findByName("news");
                $view->set('article_type', "News");
                break;
        }

        $articles  = $em->getRepository('VyperSiteBundle:Article')->showAll($articles_per_page, $page, $type);
        $view
            ->set('articles', $articles)
            ->set('page', $page)
            ->set('total_articles', ceil(count($articles)/$articles_per_page))
        ;

        return $this->render('VyperSiteBundle:Article:showAll.html.twig', $view->getView());
    }

    public function footerRecentArticlesAction()
    {
        $view = $this->container->get('saysa_view');
        $articles  = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Article')->showRecentArticles(5);
        $view->set('footer_recent_articles', $articles);
        return $this->render('VyperSiteBundle:Article:footerRecentArticles.html.twig', $view->getView());
    }

    public function recentArticlesAction()
    {
        $view = $this->container->get('saysa_view');
        $articles  = $this->getDoctrine()->getManager()->getRepository('VyperSiteBundle:Article')->showRecentArticles();
        $view->set('recent_articles', $articles);
        return $this->render('VyperSiteBundle:Article:recentArticles.html.twig', $view->getView());
    }

    public function popularArticlesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $view = $this->container->get('saysa_view');
        $results  = $em->getRepository('VyperSiteBundle:Visit')->showPopular();
        $popular_articles = array();
        foreach($results as $result) {
            $popular_articles[] = $result['item']->getArticle();
        }

        $view->set('popular_articles', $popular_articles);
        return $this->render('VyperSiteBundle:Article:popularArticles.html.twig', $view->getView());
    }

    public function headerCarouselAction()
    {
        $em = $this->getDoctrine()->getManager();
        $view = $this->container->get('saysa_view');
        $articles  = $em->getRepository('VyperSiteBundle:Article')->showRecentArticles();
        $view
            ->set('mini_carousel', $articles)
            ->set('is_carousel', true)
        ;
        return $this->render('VyperSiteBundle:Article:headerCarousel.html.twig', $view->getView());
    }

}
