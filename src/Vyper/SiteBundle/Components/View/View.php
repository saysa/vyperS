<?php
/**
 * Created by PhpStorm.
 * User: Saysa
 * Date: 09/08/14
 * Time: 16:13
 */

namespace Vyper\SiteBundle\Components\View;


class View {

    private $view = array();

    public function set($twig_var, $value)
    {
        $this->view[$twig_var] = $value;
    }

    /**
     * @return array
     */
    public function getView()
    {
        return $this->view;
    }
} 