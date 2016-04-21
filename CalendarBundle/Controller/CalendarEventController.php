<?php
/**
 * Created by PhpStorm.
 * User: Ovyn Flavian
 * Date: 17-04-16
 * Time: 10:39
 */

namespace fullCalendarFla\CalendarBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use fullCalendarFla\CalendarBundle\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CalendarEventController {

    public function __construct()
    {

    }
    public function addEventAction(Event $event)
    {
        $em = $this->getDoctrine()->getManager();

        $em->persist($event);
        $em->flush();
    }
}