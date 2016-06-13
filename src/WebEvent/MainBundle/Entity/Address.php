<?php
/**
 * Created by PhpStorm.
 * User: clementine
 * Date: 29/07/15
 * Time: 00:33
 */

namespace WebEvent\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Address
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WebEvent\MainBundle\Entity\AddressRepository")
 */
class Address
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
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=5, nullable=true)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=100, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string", length=30, nullable=true)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string", length=30, nullable=true)
     */
    private $longitude;


    /**
     * @ORM\OneToOne(targetEntity="WebEvent\MainBundle\Entity\Place", inversedBy="address" )
     * @ORM\JoinColumn(nullable=true)
     */
    private $place;

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
     * Set address
     *
     * @param string $address
     * @return Address
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set cp
     *
     * @param string $cp
     * @return Address
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Address
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }



    public function __toString(){
        return $this->address." ".$this->cp." ".$this->ville;
    }

    public function setCoords(){
if($this->address && $this->cp && $this->ville){
    // Conversion de l'address en coordonnées
    $address = $this->address." ".$this->cp." ".$this->ville;
    $geocoder = "http://maps.googleapis.com/maps/api/geocode/json?address=%s&sensor=false";

    $url_address = utf8_encode($address);
    $url_address = urlencode($url_address);
    $query = sprintf($geocoder,$url_address);
    $results = file_get_contents($query);

    $jsonResult = json_decode($results);

    if($jsonResult->{'status'} == "OK"){
        $latitude=$jsonResult->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
        $longitude=$jsonResult->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
    }else{
        // TODO : cas où l'API retourne une erreur
    }

    return $coords=array("latitude"=>$latitude,"longitude"=>$longitude);
}

    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return Address
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return Address
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set place
     *
     * @param \WebEvent\MainBundle\Entity\Place $place
     * @return Address
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
}
