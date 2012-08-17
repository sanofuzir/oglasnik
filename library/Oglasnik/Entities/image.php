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
     * @var integer $image_id
     *
     * @Column(name="image_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $image_id;

    /**
     * @var string $name
     *
     * @Column(name="name", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var Oglasnik\Entities\Ad
     *
     * @ManyToOne(targetEntity="Oglasnik\Entities\Ad")
     * @JoinColumns({
     *   @JoinColumn(name="ad_id", referencedColumnName="ad_id", nullable=false)
     * })
     */
    private $ad_id;


    /**
     * Get image_id
     *
     * @return integer 
     */
    public function getImageId()
    {
        return $this->image_id;
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
     * Set ad_id
     *
     * @param Oglasnik\Entities\Ad $adId
     * @return Image
     */
    public function setAdId(\Oglasnik\Entities\Ad $adId)
    {
        $this->ad_id = $adId;
        return $this;
    }

    /**
     * Get ad_id
     *
     * @return Oglasnik\Entities\Ad 
     */
    public function getAdId()
    {
        return $this->ad_id;
    }
}