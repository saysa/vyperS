<?php

namespace Vyper\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Manga
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vyper\SiteBundle\Entity\MangaRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Manga
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
     * @ORM\Column(name="titleReal", type="string", length=255, nullable=true)
     */
    private $titleReal;

    /**
     * @var boolean
     *
     * @ORM\Column(name="anime", type="boolean")
     */
    private $anime;

    /**
     * @var integer
     *
     * @ORM\Column(name="TomeNumber", type="integer", nullable=true)
     */
    private $tomeNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PublicationDate", type="date")
     */
    private $publicationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="publisherFR", type="string", length=255, nullable=true)
     */
    private $publisherFR;

    /**
     * @var string
     *
     * @ORM\Column(name="publisherJA", type="string", length=255, nullable=true)
     */
    private $publisherJA;

    /**
     * @var boolean
     *
     * @ORM\Column(name="complete", type="boolean")
     */
    private $complete;

    /**
     * @ORM\ManyToMany(targetEntity="Vyper\SiteBundle\Entity\MangaType", cascade={"persist"})
     */
    private $type;

    /**
     * @ORM\OneToOne(targetEntity="Vyper\SiteBundle\Entity\Picture", cascade={"persist"})
     */
    private $picture;

    /**
     * @var integer
     * Pour stocker l'ID du formulaire
     */
    private $pictureID;

    /**
     * @var string
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $slug;

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
     * @return Manga
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
     * Set titleReal
     *
     * @param string $titleReal
     * @return Manga
     */
    public function setTitleReal($titleReal)
    {
        $this->titleReal = $titleReal;

        return $this;
    }

    /**
     * Get titleReal
     *
     * @return string 
     */
    public function getTitleReal()
    {
        return $this->titleReal;
    }

    /**
     * Set anime
     *
     * @param boolean $anime
     * @return Manga
     */
    public function setAnime($anime)
    {
        $this->anime = $anime;

        return $this;
    }

    /**
     * Get anime
     *
     * @return boolean 
     */
    public function getAnime()
    {
        return $this->anime;
    }

    /**
     * Set tomeNumber
     *
     * @param integer $tomeNumber
     * @return Manga
     */
    public function setTomeNumber($tomeNumber)
    {
        $this->tomeNumber = $tomeNumber;

        return $this;
    }

    /**
     * Get tomeNumber
     *
     * @return integer 
     */
    public function getTomeNumber()
    {
        return $this->tomeNumber;
    }

    /**
     * Set publicationDate
     *
     * @param \DateTime $publicationDate
     * @return Manga
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * Get publicationDate
     *
     * @return \DateTime 
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Set type
     *
     * @param \Vyper\SiteBundle\Entity\MangaType $type
     * @return Manga
     */
    public function setType(\Vyper\SiteBundle\Entity\MangaType $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Vyper\SiteBundle\Entity\MangaType
     */
    public function getType()
    {
        return $this->type;
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

    /**
     * Set live
     *
     * @param boolean $live
     * @return Manga
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
     * @return Manga
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
     * @return Manga
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
     * @return Manga
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
     * @param int $pictureID
     */
    public function setPictureID($pictureID)
    {
        $this->pictureID = $pictureID;
    }

    /**
     * @return int
     */
    public function getPictureID()
    {
        return $this->pictureID;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->setLive(true);
        $this->setDeleted(false);
        $this->setCreated(new \DateTime('now'));
        $this->setmodified(new \DateTime('now'));
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Artist
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set publisherFR
     *
     * @param string $publisherFR
     * @return Manga
     */
    public function setPublisherFR($publisherFR)
    {
        $this->publisherFR = $publisherFR;

        return $this;
    }

    /**
     * Get publisherFR
     *
     * @return string 
     */
    public function getPublisherFR()
    {
        return $this->publisherFR;
    }

    /**
     * Set publisherJA
     *
     * @param string $publisherJA
     * @return Manga
     */
    public function setPublisherJA($publisherJA)
    {
        $this->publisherJA = $publisherJA;

        return $this;
    }

    /**
     * Get publisherJA
     *
     * @return string 
     */
    public function getPublisherJA()
    {
        return $this->publisherJA;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->type = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set complete
     *
     * @param boolean $complete
     * @return Manga
     */
    public function setComplete($complete)
    {
        $this->complete = $complete;

        return $this;
    }

    /**
     * Get complete
     *
     * @return boolean 
     */
    public function getComplete()
    {
        return $this->complete;
    }

    /**
     * Add type
     *
     * @param \Vyper\SiteBundle\Entity\MangaType $type
     * @return Manga
     */
    public function addType(\Vyper\SiteBundle\Entity\MangaType $type)
    {
        $this->type[] = $type;

        return $this;
    }

    /**
     * Remove type
     *
     * @param \Vyper\SiteBundle\Entity\MangaType $type
     */
    public function removeType(\Vyper\SiteBundle\Entity\MangaType $type)
    {
        $this->type->removeElement($type);
    }
}
