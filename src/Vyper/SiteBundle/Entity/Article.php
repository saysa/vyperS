<?php

namespace Vyper\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vyper\SiteBundle\Entity\ArticleRepository")
 */
class Article
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
     * @var integer
     *
     * @ORM\Column(name="user", type="integer")
     */
    private $user;

    /**
     * @var boolean
     *
     * @ORM\Column(name="highlight", type="boolean")
     */
    private $highlight;

    /**
     * @var integer
     *
     * @ORM\Column(name="continent", type="integer")
     */
    private $continent;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="releaseDate", type="date")
     */
    private $releaseDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="releaseTime", type="time")
     */
    private $releaseTime;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=50)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="translator", type="string", length=50)
     */
    private $translator;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=255)
     */
    private $source;

    /**
     * @var string
     *
     * @ORM\Column(name="sourceURL", type="string", length=255)
     */
    private $sourceURL;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="metaKeywords", type="text")
     */
    private $metaKeywords;

    /**
     * @var string
     *
     * @ORM\Column(name="artistsKeywords", type="text")
     */
    private $artistsKeywords;

    /**
     * @ORM\OneToOne(targetEntity="Vyper\SiteBundle\Entity\Picture", cascade={"persist"})
     */
    private $picture;

    /**
     * @var integer
     *
     * @ORM\Column(name="relatedPicture", type="integer")
     */
    private $relatedPicture;

    /**
     * @var string
     *
     * @ORM\Column(name="youtube", type="string", length=255)
     */
    private $youtube;

    /**
     * @var integer
     *
     * @ORM\Column(name="relatedGallery", type="integer")
     */
    private $relatedGallery;

    /**
     * @var integer
     *
     * @ORM\Column(name="relatedVideo", type="integer")
     */
    private $relatedVideo;

    /**
     * @var integer
     *
     * @ORM\Column(name="relatedTheme", type="integer")
     */
    private $relatedTheme;

    /**
     * @var integer
     *
     * @ORM\Column(name="relatedItem", type="integer")
     */
    private $relatedItem;

    /**
     * @var integer
     *
     * @ORM\Column(name="relatedEvent", type="integer")
     */
    private $relatedEvent;

    /**
     * @var integer
     *
     * @ORM\Column(name="relatedTour", type="integer")
     */
    private $relatedTour;

    /**
     * @var string
     *
     * @ORM\Column(name="stringURL", type="string", length=255)
     */
    private $stringURL;

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
     * Set user
     *
     * @param integer $user
     * @return Article
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set highlight
     *
     * @param boolean $highlight
     * @return Article
     */
    public function setHighlight($highlight)
    {
        $this->highlight = $highlight;

        return $this;
    }

    /**
     * Get highlight
     *
     * @return boolean 
     */
    public function getHighlight()
    {
        return $this->highlight;
    }

    /**
     * Set continent
     *
     * @param integer $continent
     * @return Article
     */
    public function setContinent($continent)
    {
        $this->continent = $continent;

        return $this;
    }

    /**
     * Get continent
     *
     * @return integer 
     */
    public function getContinent()
    {
        return $this->continent;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Article
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
     * Set description
     *
     * @param string $description
     * @return Article
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
     * Set text
     *
     * @param string $text
     * @return Article
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     * @return Article
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime 
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set releaseTime
     *
     * @param \DateTime $releaseTime
     * @return Article
     */
    public function setReleaseTime($releaseTime)
    {
        $this->releaseTime = $releaseTime;

        return $this;
    }

    /**
     * Get releaseTime
     *
     * @return \DateTime 
     */
    public function getReleaseTime()
    {
        return $this->releaseTime;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Article
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set translator
     *
     * @param string $translator
     * @return Article
     */
    public function setTranslator($translator)
    {
        $this->translator = $translator;

        return $this;
    }

    /**
     * Get translator
     *
     * @return string 
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * Set source
     *
     * @param string $source
     * @return Article
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string 
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set sourceURL
     *
     * @param string $sourceURL
     * @return Article
     */
    public function setSourceURL($sourceURL)
    {
        $this->sourceURL = $sourceURL;

        return $this;
    }

    /**
     * Get sourceURL
     *
     * @return string 
     */
    public function getSourceURL()
    {
        return $this->sourceURL;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Article
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set metaKeywords
     *
     * @param string $metaKeywords
     * @return Article
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;

        return $this;
    }

    /**
     * Get metaKeywords
     *
     * @return string 
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * Set artistsKeywords
     *
     * @param string $artistsKeywords
     * @return Article
     */
    public function setArtistsKeywords($artistsKeywords)
    {
        $this->artistsKeywords = $artistsKeywords;

        return $this;
    }

    /**
     * Get artistsKeywords
     *
     * @return string 
     */
    public function getArtistsKeywords()
    {
        return $this->artistsKeywords;
    }

    /**
     * Set relatedPicture
     *
     * @param integer $relatedPicture
     * @return Article
     */
    public function setRelatedPicture($relatedPicture)
    {
        $this->relatedPicture = $relatedPicture;

        return $this;
    }

    /**
     * Get relatedPicture
     *
     * @return integer 
     */
    public function getRelatedPicture()
    {
        return $this->relatedPicture;
    }

    /**
     * Set youtube
     *
     * @param string $youtube
     * @return Article
     */
    public function setYoutube($youtube)
    {
        $this->youtube = $youtube;

        return $this;
    }

    /**
     * Get youtube
     *
     * @return string 
     */
    public function getYoutube()
    {
        return $this->youtube;
    }

    /**
     * Set relatedGallery
     *
     * @param integer $relatedGallery
     * @return Article
     */
    public function setRelatedGallery($relatedGallery)
    {
        $this->relatedGallery = $relatedGallery;

        return $this;
    }

    /**
     * Get relatedGallery
     *
     * @return integer 
     */
    public function getRelatedGallery()
    {
        return $this->relatedGallery;
    }

    /**
     * Set relatedVideo
     *
     * @param integer $relatedVideo
     * @return Article
     */
    public function setRelatedVideo($relatedVideo)
    {
        $this->relatedVideo = $relatedVideo;

        return $this;
    }

    /**
     * Get relatedVideo
     *
     * @return integer 
     */
    public function getRelatedVideo()
    {
        return $this->relatedVideo;
    }

    /**
     * Set relatedTheme
     *
     * @param integer $relatedTheme
     * @return Article
     */
    public function setRelatedTheme($relatedTheme)
    {
        $this->relatedTheme = $relatedTheme;

        return $this;
    }

    /**
     * Get relatedTheme
     *
     * @return integer 
     */
    public function getRelatedTheme()
    {
        return $this->relatedTheme;
    }

    /**
     * Set relatedItem
     *
     * @param integer $relatedItem
     * @return Article
     */
    public function setRelatedItem($relatedItem)
    {
        $this->relatedItem = $relatedItem;

        return $this;
    }

    /**
     * Get relatedItem
     *
     * @return integer 
     */
    public function getRelatedItem()
    {
        return $this->relatedItem;
    }

    /**
     * Set relatedEvent
     *
     * @param integer $relatedEvent
     * @return Article
     */
    public function setRelatedEvent($relatedEvent)
    {
        $this->relatedEvent = $relatedEvent;

        return $this;
    }

    /**
     * Get relatedEvent
     *
     * @return integer 
     */
    public function getRelatedEvent()
    {
        return $this->relatedEvent;
    }

    /**
     * Set relatedTour
     *
     * @param integer $relatedTour
     * @return Article
     */
    public function setRelatedTour($relatedTour)
    {
        $this->relatedTour = $relatedTour;

        return $this;
    }

    /**
     * Get relatedTour
     *
     * @return integer 
     */
    public function getRelatedTour()
    {
        return $this->relatedTour;
    }

    /**
     * Set stringURL
     *
     * @param string $stringURL
     * @return Article
     */
    public function setStringURL($stringURL)
    {
        $this->stringURL = $stringURL;

        return $this;
    }

    /**
     * Get stringURL
     *
     * @return string 
     */
    public function getStringURL()
    {
        return $this->stringURL;
    }

    /**
     * Set live
     *
     * @param boolean $live
     * @return Article
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
     * @return Article
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
     * @return Article
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
     * @return Article
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
     * Set slug
     *
     * @param string $slug
     * @return Article
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
     * Set picture
     *
     * @param \Vyper\SiteBundle\Entity\Picture $picture
     * @return Article
     */
    public function setPicture(\Vyper\SiteBundle\Entity\Picture $picture)
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
