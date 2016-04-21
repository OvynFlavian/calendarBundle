<?php

namespace fullCalendarFla\CalendarBundle\Controller;

use fullCalendarFla\CalendarBundle\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;

class CalendarController extends Controller
{
    public function indexAction()
    {
        return $this->render('fullCalendarFlaCalendarBundle:calendar:index.html.twig');
    }

    public function loadEventAction(Request $request)
    {
        if($request->getMethod() == "GET")
        {
            $em = $this->getDoctrine()->getRepository('fullCalendarFlaCalendarBundle:Event');
            $query = $em->findAll();

            $events = $query;

            $response = new \Symfony\Component\HttpFoundation\Response();
            $response->headers->set('Content-Type', 'application/json');
            $return_events = array();

            foreach($events as $event) {
                $return_events[] = $event->toArray();
            }
            $return = json_encode($return_events);
            return new Response($return);
        }
        return $this->render('fullCalendarFlaCalendarBundle:calendar:index.html.twig');
    }

    public function addEventAction(Request $request)
    {
        $event = new Event();
        $em = $this->getDoctrine()->getManager();
        $post = $request->request;

        $event->setTitle($post->get('title'));
        $event->setAllDay($post->get('allDay'));
        $event->setStart(new DateTime($post->get('start')));
        $event->setEnd(new DateTime($post->get('end')));
        $event->setPropriete($post->get('desc'));
        //$event->setEmployeId($post->get('Eid'));

        $em->persist($event);
        $em->flush();

        return $this->render('fullCalendarFlaCalendarBundle:calendar:index.html.twig');
    }

    public function modifyEventAction(Request $request)
    {

    }
}
