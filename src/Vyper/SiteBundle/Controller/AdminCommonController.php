<?php
/**
 * Created by PhpStorm.
 * User: Saysa
 * Date: 10/08/14
 * Time: 14:06
 */

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AdminCommonController extends Controller {

    protected function _secure($request)
    {
        $session = $request->getSession();
        $user = $session->get('user');

        if (is_null($user)) return false;

        return true;
    }
} 