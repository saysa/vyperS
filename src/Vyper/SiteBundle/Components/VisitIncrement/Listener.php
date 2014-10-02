<?php
/**
 * Created by PhpStorm.
 * User: saysa
 * Date: 02/10/2014
 * Time: 08:42
 */

namespace Vyper\SiteBundle\Components\VisitIncrement;

use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class Listener {

    protected $visitIncrement;

    public function __construct(VisitIncrement $visitIncrement, $em)
    {
        $this->visitIncrement = $visitIncrement;
    }

    public function process(FilterControllerEvent $event)
    {

        $this->visitIncrement->increment($event->getRequest());
    }
} 