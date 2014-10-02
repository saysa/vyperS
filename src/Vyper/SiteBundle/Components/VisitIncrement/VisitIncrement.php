<?php
/**
 * Created by PhpStorm.
 * User: saysa
 * Date: 02/10/2014
 * Time: 08:33
 */

namespace Vyper\SiteBundle\Components\VisitIncrement;


use Symfony\Component\HttpFoundation\Request;

class VisitIncrement {

    public function increment(Request $request)
    {
        echo "incremente up";

        return true;
    }
} 