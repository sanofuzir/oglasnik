<?php

namespace Oglasnik\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Oglasnik\Entities\Ad
 *
 * @ORM\Table(name="ad", uniqueConstraints={@ORM\UniqueConstraint(name="name_uk", columns={"name"})})
 * @ORM\Entity
 */
class Ad
{
    /**
     * @var integer $ad_id
     *
     * @ORM\Column(name="ad_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ad_id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var integer $price
     *
     * @ORM\Column(name="price", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $price;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $description;

    /**
     * @var string $status
     *
     * @ORM\Column(name="status", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $status;

    /**
     * @var datetime $created
     *
     * @ORM\Column(name="created", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $created;

    /**
     * @var Oglasnik\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="Oglasnik\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $user_id;

    /**
     * @var Oglasnik\Entities\Category
     *
     * @ORM\ManyToOne(targetEntity="Oglasnik\Entities\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $category_id;

    /**
     * @var Oglasnik\Entities\Category
     *
     * @ORM\ManyToOne(targetEntity="Oglasnik\Entities\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $subcategory_id;


    /**
     * Get ad_id
     *
     * @return integer 
     */
    public function getAdId()
    {
        return $this->ad_id;
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
     * @param integer $price
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
     * @return integer 
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
     * Set user_id
     *
     * @param Oglasnik\Entities\User $userId
     * @return Ad
     */
    public function setUserId(\Oglasnik\Entities\User $userId)
    {
        $this->user_id = $userId;
        return $this;
    }

    /**
     * Get user_id
     *
     * @return Oglasnik\Entities\User 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set category_id
     *
     * @param Oglasnik\Entities\Category $categoryId
     * @return Ad
     */
    public function setCategoryId(\Oglasnik\Entities\Category $categoryId)
    {
        $this->category_id = $categoryId;
        return $this;
    }

    /**
     * Get category_id
     *
     * @return Oglasnik\Entities\Category 
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set subcategory_id
     *
     * @param Oglasnik\Entities\Category $subcategoryId
     * @return Ad
     */
    public function setSubcategoryId(\Oglasnik\Entities\Category $subcategoryId)
    {
        $this->subcategory_id = $subcategoryId;
        return $this;
    }

    /**
     * Get subcategory_id
     *
     * @return Oglasnik\Entities\Category 
     */
    public function getSubcategoryId()
    {
        return $this->subcategory_id;
    }
}