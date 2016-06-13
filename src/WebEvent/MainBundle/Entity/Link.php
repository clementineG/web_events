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
 * @ORM\Entity(repositoryClass="WebEvent\MainBundle\Entity\LinkRepository")
 */
class Link
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_link;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable = true)
     */
    protected $url;

    /**
     * Get id_link
     *
     * @return integer 
     */
    public function getIdLink()
    {
        return $this->id_link;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Link
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    
}
