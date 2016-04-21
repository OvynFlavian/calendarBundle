<?php

namespace fullCalendarFla\CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="fullCalendarFla\CalendarBundle\Repository\EventRepository")
 */
class Event
{
    const ALL_DAY_REGEX = '/^\d{4}-\d\d-\d\d$/';
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(name="allDay", type="boolean")
     */
    private $allDay;
    /**
     * @ORM\Column(name="title", type="string")
     */
    private $title;
    /**
     * @ORM\Column(name="start", type="datetime")
     */
    private $start;
    /**
     * @ORM\Column(name="end", type="datetime")
     */
    private $end = null;
    /**
     * @ORM\Column(name="detail", type="boolean")
     */
    private $detail;
    /**
     * @ORM\Column(name="EId", type="integer")
     */
    private $employeId;
    /**
     * @ORM\Column(name="proprietes", type="array")
     */
    private $proprietes;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param mixed $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return null
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param null $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return mixed
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * @param mixed $detail
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;
    }

    /**
     * @return mixed
     */
    public function getEmployeId()
    {
        return $this->employeId;
    }

    /**
     * @param mixed $employeId
     */
    public function setEmployeId($employeId)
    {
        $this->employeId = $employeId;
    }

    /**
     * @return array
     */
    public function getPropriete()
    {
        return $this->proprietes;
    }

    /**
     * @param array $propriete
     */
    public function setPropriete($propriete)
    {
        $this->proprietes = $propriete;
    }

    public function toArray()
    {
        $array = array(
            "title" => $this->title,
            "start"=> $this->start->format("Y-m-d H:m:s"),
            "end" => $this->end->format("Y-m-d H:m:s"),
            "detail" =>$this->proprietes['Desc'],
            "allDay"=> $this->allDay);

        return $array;
    }

    /**
     * @return mixed
     */
    public function getAllDay()
    {
        return $this->allDay;
    }

    /**
     * @param mixed $allDay
     */
    public function setAllDay($allDay)
    {
        $this->allDay = $allDay;
    }
}
