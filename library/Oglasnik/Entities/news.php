<?php

namespace Oglasnik\Entities;

/**
 * Oglasnik\Entities\News
 *
 * @Table(name="news")
 * @Entity
 */
class News
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
     * @var text $text
     *
     * @Column(name="text", type="text")
     */
    private $text;

    /**
     * @var string $active
     *
     * @Column(name="active", type="string", length=3)
     */
    private $active;

    /**
     * @var Oglasnik\Entities\User
     *
     * @ManyToOne(targetEntity="Oglasnik\Entities\User", inversedBy="news")
     * @JoinColumns({
     *   @JoinColumn(name="id", referencedColumnName="id", nullable=false)
     * })
     */
    private $user;


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
     * @return News
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
     * Set text
     *
     * @param text $text
     * @return News
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Get text
     *
     * @return text 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set active
     *
     * @param string $active
     * @return News
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * Get active
     *
     * @return string 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set user
     *
     * @param Oglasnik\Entities\User $user
     * @return News
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
}