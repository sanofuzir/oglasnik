<?php

namespace Oglasnik\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Oglasnik\Entities\Image
 *
 * @ORM\Table(name="image", uniqueConstraints={@ORM\UniqueConstraint(name="name_uk", columns={"name"})})
 * @ORM\Entity
 */
class Image
{
    /**
     * @var integer $image_id
     *
     * @ORM\Column(name="image_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $image_id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var Oglasnik\Entities\Ad
     *
     * @ORM\ManyToOne(targetEntity="Oglasnik\Entities\Ad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ad_id", referencedColumnName="id", nullable=false)
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