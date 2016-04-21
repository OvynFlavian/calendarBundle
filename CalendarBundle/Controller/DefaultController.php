<?php

namespace fullCalendarFla\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('fullCalendarFlaCalendarBundle:Default:index.html.twig');
    }
}
