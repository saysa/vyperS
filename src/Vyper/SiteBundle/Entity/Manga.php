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
}
