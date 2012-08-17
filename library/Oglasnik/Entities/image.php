<?php

namespace Oglasnik\Entities;

/**
 * Oglasnik\Entities\Image
 *
 * @Table(name="image")
 * @Entity
 */
class Image
{
    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", nullable=false, unique=true)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $name
     *
     * @Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var Oglasnik\Entities\Ad
     *
     * @ManyToOne(targetEntity="Oglasnik\Entities\Ad")
     * @JoinColumns({
     *   @JoinColumn(name="id", referencedColumnName="id", nullable=false)
     * })
     */
    private $ad;


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
     * @return Image
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
     * Set ad
     *
     * @param Oglasnik\Entities\Ad $ad
     * @return Image
     */
    public function setAd(\Oglasnik\Entities\Ad $ad)
    {
        $this->ad = $ad;
        return $this;
    }

    /**
     * Get ad
     *
     * @return Oglasnik\Entities\Ad 
     */
    public function getAd()
    {
        return $this->ad;
    }
}