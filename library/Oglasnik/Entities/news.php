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
     * @var integer $news_id
     *
     * @Column(name="news_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $news_id;

    /**
     * @var string $name
     *
     * @Column(name="name", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var string $text
     *
     * @Column(name="text", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $text;

    /**
     * @var string $active
     *
     * @Column(name="active", type="string", length=3, precision=0, scale=0, nullable=false, unique=false)
     */
    private $active;

    /**
     * @var Oglasnik\Entities\User
     *
     * @ManyToOne(targetEntity="Oglasnik\Entities\User")
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="user_id", nullable=false)
     * })
     */
    private $user_id;


    /**
     * Get news_id
     *
     * @return integer 
     */
    public function getNewsId()
    {
        return $this->news_id;
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
     * @param string $text
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
     * @return string 
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
     * Set user_id
     *
     * @param Oglasnik\Entities\User $userId
     * @return News
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
}