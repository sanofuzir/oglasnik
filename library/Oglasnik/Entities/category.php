<?php

namespace Oglasnik\Entities;

/**
 * Oglasnik\Entities\Category
 *
 * @Table(name="category")
 * @Entity
 */
class Category
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
     * @var string $title
     *
     * @Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string $name
     *
     * @Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @OneToMany(targetEntity="Oglasnik\Entities\Ad", mappedBy="category")
     **/
    private $ads;

    public function __construct() {
        $this->ads = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Category
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

    public function getNumberOfAds() 
    {
        return $this->ads->count();
    }

    /**
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getAds()
    {
        return $this->ads;
    }
}