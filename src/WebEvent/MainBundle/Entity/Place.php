<?php
/**
 * Created by PhpStorm.
 * User: clementine
 * Date: 22/08/15
 * Time: 16:33
 */

namespace WebEvent\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use DoctrineCommonCollectionsArrayCollection;

/**
 * Address
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WebEvent\MainBundle\Entity\PlaceRepository")
 */
class Place
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;
    /**
     * @var text
     *
     * @ORM\Column(name="description", type="text",length=400, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     */
    private $facebook;
    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    private $twitter;
    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @var ArrayCollection $editions
     *
     * @ORM\OneToMany(targetEntity="WebEvent\EventBundle\Entity\Edition", mappedBy="place", cascade={"persist", "remove", "merge"})
     */
    private $editions;

    /**
     * @ORM\OneToOne(targetEntity="WebEvent\MainBundle\Entity\Address", cascade={"remove"})
     */
    private $address;

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
     * @return Place
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
        $this->editions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add editions
     *
     * @param \WebEvent\EventBundle\Entity\Edition $editions
     * @return Place
     */
    public function addEdition(\WebEvent\EventBundle\Entity\Edition $editions)
    {
        $this->editions[] = $editions;

        return $this;
    }

    /**
     * Remove editions
     *
     * @param \WebEvent\EventBundle\Entity\Edition $editions
     */
    public function removeEdition(\WebEvent\EventBundle\Entity\Edition $editions)
    {
        $this->editions->removeElement($editions);
    }

    /**
     * Get editions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEditions()
    {
        return $this->editions;
    }

    /**
     * Set address
     *
     * @param \WebEvent\MainBundle\Entity\Address $address
     * @return Place
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
     * Set description
     *
     * @param string $description
     * @return Place
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
     * Set facebook
     *
     * @param string $facebook
     * @return Place
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     * @return Place
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }



    /**
     * Set website
     *
     * @param string $website
     * @return Place
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }
}
