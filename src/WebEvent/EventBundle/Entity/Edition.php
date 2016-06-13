<?php
/**
 * Created by PhpStorm.
 * User: clementine
 * Date: 28/07/15
 * Time: 23:49
 */

namespace WebEvent\EventBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use DoctrineCommonCollectionsArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="edition")
 */
class Edition
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id_edition;

    /**
     * @var datetime
     *
     * @ORM\Column(name="start", type="datetime")
     */
    protected $start;

    /**
     * @var datetime
     *
     * @ORM\Column(name="end", type="datetime")
     */
    protected $end;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    protected $price;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string",nullable = true)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="h1", type="string")
     */
    protected $h1;

    /**
     * @var string
     *
     * @ORM\Column(name="h2", type="string",nullable = true)
     */
    protected $h2;

   /**
     * @var text
     *
     * @ORM\Column(name="description", type="text",nullable = true)
     */
    protected $description;


    /**
     * @ORM\OneToOne(targetEntity="WebEvent\MainBundle\Entity\Address", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $address;

    /**
     * @ORM\OneToOne(targetEntity="WebEvent\MainBundle\Entity\Link", cascade={"persist"})
     */
    private $link;

    /**
     * @var Place $place
     *
     * @ORM\ManyToOne(targetEntity="WebEvent\MainBundle\Entity\Place", inversedBy="editions", cascade={"persist", "merge"})
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="Place_idPlace", referencedColumnName="id")
     * })
     */
    private $place;

    /**
     * @ORM\OneToOne(targetEntity="WebEvent\MainBundle\Entity\Document", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $cover;

    /**
     * @var Event $event
     *
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="editions", cascade={"persist", "merge"})
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="Event_idEvent", referencedColumnName="id")
     * })
     */
    private $event;

    /**
     * Get id_edition
     *
     * @return integer 
     */
    public function getIdEdition()
    {
        return $this->id_edition;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     * @return Edition
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return Edition
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime 
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Edition
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Edition
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set h1
     *
     * @param string $h1
     * @return Edition
     */
    public function setH1($h1)
    {
        $this->h1 = $h1;

        return $this;
    }

    /**
     * Get h1
     *
     * @return string 
     */
    public function getH1()
    {
        return $this->h1;
    }

    /**
     * Set h2
     *
     * @param string $h2
     * @return Edition
     */
    public function setH2($h2)
    {
        $this->h2 = $h2;

        return $this;
    }

    /**
     * Get h2
     *
     * @return string 
     */
    public function getH2()
    {
        return $this->h2;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Edition
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set address
     *
     * @param \WebEvent\MainBundle\Entity\Address $address
     * @return Edition
     */
    public function setAddress(\WebEvent\MainBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \WebEvent\MainBundle\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }


    /**
     * Set link
     *
     * @param \WebEvent\MainBundle\Entity\Link $link
     * @return Edition
     */
    public function setLink(\WebEvent\MainBundle\Entity\Link $link = null)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return \WebEvent\MainBundle\Entity\Link 
     */
    public function getLink()
    {
        return $this->link;
    }


    /**
     * Set place
     *
     * @param \WebEvent\MainBundle\Entity\Place $place
     * @return Edition
     */
    public function setPlace(\WebEvent\MainBundle\Entity\Place $place = null)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return \WebEvent\MainBundle\Entity\Place 
     */
    public function getPlace()
    {
        return $this->place;
    }
    

    /**
     * Set cover
     *
     * @param \WebEvent\MainBundle\Entity\Document $cover
     * @return Edition
     */
    public function setCover(\WebEvent\MainBundle\Entity\Document $cover = null)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return \WebEvent\MainBundle\Entity\Document 
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set event
     *
     * @param \WebEvent\EventBundle\Entity\Event $event
     * @return Edition
     */
    public function setEvent(\WebEvent\EventBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \WebEvent\EventBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }
}
