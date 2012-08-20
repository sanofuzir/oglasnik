<?php

namespace Oglasnik\Entities;

/**
 * Oglasnik\Entities\Ad
 *
 * @Table(name="ad")
 * @Entity
 */
class Ad
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
     * @var decimal $price
     *
     * @Column(name="price", type="decimal", precision=12, scale=2, nullable=false)
     */
    private $price;

    /**
     * @var string $description
     *
     * @Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string $status
     *
     * @Column(name="status", type="string", length=10)
     */
    private $status;

    /**
     * @var datetime $created
     *
     * @Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var Oglasnik\Entities\User
     *
     * @ManyToOne(targetEntity="Oglasnik\Entities\User", inversedBy="ads")
     * @JoinColumn(name="user", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @var Oglasnik\Entities\Category
     *
     * @ManyToOne(targetEntity="Oglasnik\Entities\Category", inversedBy="ads")
     * @JoinColumn(name="category", referencedColumnName="id", nullable=false)
     */
    private $category;


     /**
     * @OneToOne(targetEntity="Oglasnik\Entities\Image")
     * @JoinColumn(name="image", referencedColumnName="id")
     **/
    private $image;

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
     * @return Ad
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
     * Set price
     *
     * @param decimal $price
     * @return Ad
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get price
     *
     * @return decimal 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Ad
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
     * Set status
     *
     * @param string $status
     * @return Ad
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set created
     *
     * @param datetime $created
     * @return Ad
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * Get created
     *
     * @return datetime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set user
     *
     * @param Oglasnik\Entities\User $user
     * @return Ad
     */
    public function setUser(\Oglasnik\Entities\User $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return Oglasnik\Entities\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set category
     *
     * @param Oglasnik\Entities\Category $category
     * @return Ad
     */
    public function setCategory(\Oglasnik\Entities\Category $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     *
     * @return Oglasnik\Entities\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * Set image
     *
     * @param Oglasnik\Entities\Image $image
     * @return Ad
     */
    public function setImage(\Oglasnik\Entities\Image $image)
    {
        $this->image = $image;
        return $this;
    }
    /**
     * Get image
     *
     * @return Oglasnik\Entities\Image 
     */
    public function getImage()
    {
        return $this->image;
    }

}