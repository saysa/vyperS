<?php

namespace Vyper\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visite
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vyper\SiteBundle\Entity\VisiteRepository")
 */
class Visite
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
     * @ORM\Column(name="ip", type="string", length=255)
     */
    private $ip;

    /**
     * @ORM\ManyToOne(targetEntity="Vyper\SiteBundle\Entity\Article")
     * @ORM\JoinColumn(nullable=true)
     */
    private $article;

    /**
     * @ORM\ManyToOne(targetEntity="Vyper\SiteBundle\Entity\Event")
     * @ORM\JoinColumn(nullable=true)
     */
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity="Vyper\SiteBundle\Entity\Artist")
     * @ORM\JoinColumn(nullable=true)
     */
    private $artist;

    /**
     * @ORM\ManyToOne(targetEntity="Vyper\SiteBundle\Entity\Album")
     * @ORM\JoinColumn(nullable=true)
     */
    private $album;

    /**
     * @ORM\ManyToOne(targetEntity="Vyper\SiteBundle\Entity\Disco")
     * @ORM\JoinColumn(nullable=true)
     */
    private $disco;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;


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
     * Set ip
     *
     * @param string $ip
     * @return Visite
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Visite
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
     * Set article
     *
     * @param \Vyper\SiteBundle\Entity\Article $article
     * @return Visite
     */
    public function setArticle(\Vyper\SiteBundle\Entity\Article $article = null)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \Vyper\SiteBundle\Entity\Article 
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set event
     *
     * @param \Vyper\SiteBundle\Entity\Event $event
     * @return Visite
     */
    public function setEvent(\Vyper\SiteBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Vyper\SiteBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set artist
     *
     * @param \Vyper\SiteBundle\Entity\Artist $artist
     * @return Visite
     */
    public function setArtist(\Vyper\SiteBundle\Entity\Artist $artist = null)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist
     *
     * @return \Vyper\SiteBundle\Entity\Artist 
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Set album
     *
     * @param \Vyper\SiteBundle\Entity\Album $album
     * @return Visite
     */
    public function setAlbum(\Vyper\SiteBundle\Entity\Album $album = null)
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Get album
     *
     * @return \Vyper\SiteBundle\Entity\Album 
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * Set disco
     *
     * @param \Vyper\SiteBundle\Entity\Disco $disco
     * @return Visite
     */
    public function setDisco(\Vyper\SiteBundle\Entity\Disco $disco = null)
    {
        $this->disco = $disco;

        return $this;
    }

    /**
     * Get disco
     *
     * @return \Vyper\SiteBundle\Entity\Disco 
     */
    public function getDisco()
    {
        return $this->disco;
    }
}
