<?php

namespace Vyper\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vyper\SiteBundle\Entity\EventRepository")
 */
class Event
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="realTitle", type="string", length=255)
     */
    private $realTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionReal", type="text")
     */
    private $descriptionReal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="time")
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=100)
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="Vyper\SiteBundle\Entity\Location")
     * @ORM\JoinColumn(nullable=false)
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity="Vyper\SiteBundle\Entity\EventType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="Vyper\SiteBundle\Entity\Tour")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tour;

    /**
     * @ORM\OneToOne(targetEntity="Vyper\SiteBundle\Entity\Picture", cascade={"persist"})
     */
    private $picture;

    /**
     * @var boolean
     *
     * @ORM\Column(name="live", type="boolean")
     */
    private $live;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deleted", type="boolean")
     */
    private $deleted;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime")
     */
    private $modified;


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
     * Set title
     *
     * @param string $title
     * @return Event
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
     * Set realTitle
     *
     * @param string $realTitle
     * @return Event
     */
    public function setRealTitle($realTitle)
    {
        $this->realTitle = $realTitle;

        return $this;
    }

    /**
     * Get realTitle
     *
     * @return string 
     */
    public function getRealTitle()
    {
        return $this->realTitle;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Event
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
     * Set descriptionReal
     *
     * @param string $descriptionReal
     * @return Event
     */
    public function setDescriptionReal($descriptionReal)
    {
        $this->descriptionReal = $descriptionReal;

        return $this;
    }

    /**
     * Get descriptionReal
     *
     * @return string 
     */
    public function getDescriptionReal()
    {
        return $this->descriptionReal;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Event
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     * @return Event
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Event
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set live
     *
     * @param boolean $live
     * @return Event
     */
    public function setLive($live)
    {
        $this->live = $live;

        return $this;
    }

    /**
     * Get live
     *
     * @return boolean 
     */
    public function getLive()
    {
        return $this->live;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     * @return Event
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Event
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     * @return Event
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime 
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set location
     *
     * @param \Vyper\SiteBundle\Entity\Location $location
     * @return Event
     */
    public function setLocation(\Vyper\SiteBundle\Entity\Location $location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return \Vyper\SiteBundle\Entity\Location 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set type
     *
     * @param \Vyper\SiteBundle\Entity\EventType $type
     * @return Event
     */
    public function setType(\Vyper\SiteBundle\Entity\EventType $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Vyper\SiteBundle\Entity\EventType 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set tour
     *
     * @param \Vyper\SiteBundle\Entity\Tour $tour
     * @return Event
     */
    public function setTour(\Vyper\SiteBundle\Entity\Tour $tour)
    {
        $this->tour = $tour;

        return $this;
    }

    /**
     * Get tour
     *
     * @return \Vyper\SiteBundle\Entity\Tour 
     */
    public function getTour()
    {
        return $this->tour;
    }

    /**
     * Set picture
     *
     * @param \Vyper\SiteBundle\Entity\Picture $picture
     * @return Event
     */
    public function setPicture(\Vyper\SiteBundle\Entity\Picture $picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return \Vyper\SiteBundle\Entity\Picture 
     */
    public function getPicture()
    {
        return $this->picture;
    }
}
