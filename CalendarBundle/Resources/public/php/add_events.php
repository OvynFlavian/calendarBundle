<?php
    use fullCalendarFla\CalendarBundle\Entity\Event as EventEntity;
    use fullCalendarFla\CalendarBundle\Controller\CalendarEventController as CalendarController;

    $controller = new CalendarController();

    $event = new EventEntity($_POST);
    $controller->addEventAction($event);
?>