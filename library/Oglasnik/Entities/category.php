<?php

namespace Oglasnik\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Oglasnik\Entities\Category
 *
 * @Table(name="category")
 * @Entity
 */
class Category
{
    /**
     * @var integer $category_id
     *
     * @Column(name="category_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $category_id;

    /**
     * @var string $name
     *
     * @Column(name="name", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;


    /**
     * Get category_id
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->category_id;
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
}