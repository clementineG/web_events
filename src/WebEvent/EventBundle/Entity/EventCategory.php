<?php
/**
 * Created by PhpStorm.
 * User: clementine
 * Date: 10/09/15
 * Time: 21:09
 */

namespace WebEvent\EventBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use WebEvent\EventBundle\Entity\Event;

/**
 * @ORM\Entity
 * @ORM\Table(name="event_category")
 */
class EventCategory

{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var ArrayCollection $events
     *
     * @ORM\OneToMany(targetEntity="Event", mappedBy="event", cascade={"persist", "remove", "merge"})
     */
    private $events;

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
     * Set name
     *
     * @param string $name
     * @return EventCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->events = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add events
     *
     * @param \WebEvent\EventBundle\Entity\Event $events
     * @return EventCategory
     */
    public function addEvent(\WebEvent\EventBundle\Entity\Event $events)
    {
        $this->events[] = $events;

        return $this;
    }

    /**
     * Remove events
     *
     * @param \WebEvent\EventBundle\Entity\Event $events
     */
    public function removeEvent(\WebEvent\EventBundle\Entity\Event $events)
    {
        $this->events->removeElement($events);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvents()
    {
        return $this->events;
    }
}
